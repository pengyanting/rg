<template>
    <div class="uploadBox"
         @mouseover.stop="handleMouseOver"
         @mouseout.stop="handleMouseOut">
        <el-row class="uploadBtn"
                v-show="showBtn">
            <i class="el-icon-upload"></i>
            <el-button type="text">点击上传文件</el-button>
        </el-row>
        <el-progress :percentage="percentage"
                     v-show="progress"
                     :status="state"></el-progress>
        <transition name="fade">
            <el-row class="mask"
                    v-show="showMask">
                <el-col :span="12"
                        class="iconBtn">
                    <i class="el-icon-view"></i>
                    <span>查看原图</span>
                </el-col>
                <el-col :span="12"
                        class="iconBtn">
                    <i class="el-icon-delete2"
                       @click="deleteImg"></i>
                    <span @click="deleteImg">删除</span>
                </el-col>
                <el-col class="maskFoo">
                    <span>{{imgName}}</span>
                </el-col>
            </el-row>
        </transition>
        <img :src="imgUrl"
             alt=""
             v-show="showImg">
        <input type="file"
               @change="showPreview"
               ref="fileDetail">
    </div>
</template>
<script>
export default {
    data() {
        return {
            imgUrl: this.message,
            showImg: false,
            showBtn: true,
            imgName: "",
            showMask: false,
            hoverFlag: false,
            progress: false,
            percentage: 0,
            state: ""
        }
    },
    props: ['message'],
    mounted() {
        if (this.imgUrl) {
            this.showImg = true;
            this.hoverFlag = true;
        }
    },
    methods: {
        showPreview(e) {
            var vm = this;
            var source = vm.$refs.fileDetail
            var file = source.files[0];
            vm.imgName = file.name ? file.name : "";
            if (window.FileReader) {
                var fr = new FileReader();
                fr.onloadend = function (e) {
                    vm.imgUrl = e.target.result;
                    vm.progress = true;
                    var t = setInterval(function () {
                        vm.percentage++;
                        if (vm.percentage >= 100) {
                            clearInterval(t);
                            vm.showImg = true;
                            vm.showBtn = false;
                            vm.hoverFlag = true;
                            vm.state = "success";
                            vm.progress = false;
                            vm.state = "";
                            vm.percentage = 0;
                            return;
                        }
                    }, 1)
                }
                fr.readAsDataURL(file);
            }
           
            this.$emit("showPreview", source.value)
        },
        handleMouseOver() {
            if (!this.hoverFlag) {
                return;
            }
            this.showMask = true;
        },
        handleMouseOut() {
            this.showMask = false;
        },
        deleteImg() {
            this.imgUrl = "";
            this.showImg = false;
            this.showBtn = true;
            this.hoverFlag = false;
            this.showMask = false;
            this.state = "";
            this.percentage = 0;
            this.$emit("showPreview", "")
        }
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
    .uploadBox{
        width: 300px;
        height: 150px;
        position: relative;
        background: #FBFDFF;
        border: 1px solid #CDD7E1;
        border-radius: 3px;
        cursor: pointer;
        display: inline-block;
        [type=file]{
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            z-index: 33;
        }
        img{
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            right: 0;
            z-index: 2;
        }
        .uploadBtn{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            z-index: 0;
            i{
                font-size: 67px;
                color: #97a8be;
                margin: 20px 110px;
                line-height: 50px;
            }
            .el-button--text{
                width: 100%;
            }
        }
        .mask{
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 40;
            background: rgba(0, 0, 0, 0.8);
            overflow: hidden;
            .maskFoo{
                width: 100%;
                background: #fff;
                padding:0px 10px;
                position: absolute;
                bottom: 0;
                left: 0;
            }
            .iconBtn{
                color: #fff;
                padding-top: 20px;
                i{
                    margin: 10px 62px;
                    font-size: 20px;
                }
                span{
                    display: inline-block;
                    width: 100%;
                    text-align: center;
                }
            }
        }
        .fade-enter-active, .fade-leave-active {
            transition: opacity .5s;
            .maskFoo{
                bottom: 0px;
                -webkit-transition: bottom .5s ;
                -moz-transition: bottom .5s ;
                -ms-transition: bottom .5s ;
                -o-transition: bottom .5s ;
                transition: bottom .5s ;
            }
        }
        .fade-enter, .fade-leave-active {
            opacity: 0;
            .maskFoo{
                bottom: -36px;
            }
        }
        .el-progress{
            top: 85px;
            left: 22px;
        }
    }
</style>
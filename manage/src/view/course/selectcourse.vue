<!--商户通对象维护-->
<template>
    <el-row>
        <!--查询课程-->
        <el-col :span="24"
                class="toolbar">
            <el-form :inline="true"
                     :model="formInline"
                     ref="formInline"
                     class="demo-form-inline">
                <el-form-item label="精确搜索："
                              label-width="90px">
                </el-form-item>
                <el-form-item prop="title">
                    <el-input v-model="formInline.title"
                              placeholder="请输入课程名称"></el-input>
                </el-form-item>
                <el-form-item prop="teacher">
                    <el-input v-model="formInline.teacher"
                              placeholder="请输入主讲教师"></el-input>
                </el-form-item>
                <el-form-item prop="type">
                    <el-select v-model="formInline.type"
                               clearable
                               placeholder="请选择课程类型">
                        <el-option v-for="item in typeList"
                                   :label="item.label"
                                   :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item prop="direction">
                    <el-select v-model="formInline.direction"
                               clearable
                               placeholder="请选择课程方向">
                        <el-option v-for="item in direList"
                                   :label="item.label"
                                   :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
            </el-form>
        </el-col>
        <!--按钮-->
        <el-col :span="24">
            <el-button-group class="navBtn">
                <el-button type="primary"
                           icon="search"
                           @click="handleSearch">搜索</el-button>
                <el-button type="primary"
                           @click="handleReset"
                           class="btnStyle"><i class="iconfonts icon-reset el-icon--left"></i>重置</el-button>
                <el-button type="primary"
                           @click="handleAdd"><i class="el-icon-plus el-icon-left"></i>新建</el-button>
            </el-button-group>
        </el-col>
        <!--表格-->
        <el-col :span="24">
            <el-table :data="tableData"
                      border
                      stripe
                      style="width: 100%"
                      height="350">
                <el-table-column fixed
                                 prop="id"
                                 label="ID"
                                 width="80">
                </el-table-column>
                <el-table-column prop="title"
                                 label="课程名称"
                                 width="120">
                </el-table-column>
                <el-table-column prop="teacher"
                                 label="主讲教师"
                                 width="140">
                </el-table-column>
                <el-table-column prop="type"
                                 label="课程类型"
                                 width="130">
                </el-table-column>
                <el-table-column prop="direction"
                                 label="课程方向"
                                 width="170">
                </el-table-column>
                <el-table-column prop="examtype"
                                 label="考核方式"
                                 width="140">
                </el-table-column>
                <el-table-column inline-template
                                 :context="_self"
                                 fixed="right"
                                 label="操作"
                                 width="150">
                    <div>
                        <el-button type="danger"
                                   size="small"
                                   @click.native="handleDelete($index, row)">删除</el-button>
                    </div>
                </el-table-column>
            </el-table>
        </el-col>
        <!--分页-->
        <el-col :span="24"
                class="pagination">
            <el-pagination @size-change="handleSizeChange"
                           @current-change="handleCurrentChange"
                           :current-page="1"
                           :page-sizes="[10, 20, 30, 40]"
                           :page-size="100"
                           layout="total, sizes, prev, pager, next, jumper"
                           :total="total">
            </el-pagination>
        </el-col>
    </el-row>
</template>
<script>
import axios from "axios"
var qs = require('querystring');
export default {
    data() {
        return {
            tableData: [],
            total:0,//总条数
            currentPage:0,
            formInline: {
                title: '',
                type: '',
                direction: '',
                teacher:''
            },
            searchtype: 8,
            typeList: [
                {
                    value: '全部',
                    label: '全部'
                }, {
                    value: '基础',
                    label: '基础'
                }, {
                    value: '中级',
                    label: '中级'
                }, {
                    value: '高级',
                    label: '高级'
                }, {
                    value: '实战案例',
                    label: '实战案例'
                }, {
                    value: '工具软件',
                    label: '工具软件'
                }],
            direList: [
                {
                    value: "全部",
                    label: "全部"
                }, {
                    value: "可视化编程",
                    label: "可视化编程"
                }, {
                    value: "web应用程序设计",
                    label: "web应用程序设计",
                }, {
                    value: "软件测试",
                    label: "软件测试",
                }, {
                    value: '数据库管理',
                    label: '数据库管理'
                }, {
                    value: '图形图像制作',
                    label: '图形图像制作'
                }, {
                    value: '网络构建技术',
                    label: '网络构建技术'
                }, {
                    value: '网络系统管理',
                    label: '网络系统管理'
                }, {
                    value: '多媒体制作',
                    label: '多媒体制作'
                }, {
                    value: '计算机办公应用',
                    label: '计算机办公应用'
                }]
        }
    },
    mounted: function () {
        this.handleSearch();
        this.selectCount();
    },
    methods: {
        handleReset() {
            this.$refs.formInline.resetFields();
        },
        handleSearch() {
            var vm = this;
            this.$store.dispatch('LOAD', true);
            var sql = "select * from courses where 1=1 "
           
            if (vm.formInline.title) {
                sql += "and title like'%" + vm.formInline.title + "%' "
            }
            if (vm.formInline.type) {
                sql += "and type='" + vm.formInline.type + "' "
            }
            if (vm.formInline.direction) {
                sql += "and direction='" + vm.formInline.direction + "' "
            }
            if (vm.formInline.teacher) {
                sql += "and teacher like '%" + vm.formInline.teacher + "%' "
            }
            sql += " limit "+vm.currentPage+","+(vm.currentPage+1)*10
            axios.post(this.$root._data.apiUrl + "manage/selectcourse.php", qs.stringify({
                sql: sql,
            })).then(function (res) {
                console.log(res.data)
                setTimeout(() => {
                    vm.$store.dispatch('LOAD', false);
                    if (res.data.length > 0) {
                        vm.tableData = res.data;
                    } else {
                        vm.tableData = '';
                    }
                }, 1000);
            }).catch(function (error) {
                vm.$message({
                    message: '查询失败！',
                    type: 'error'
                });
            })
        },
        selectCount(){
            var count= "select count(*) from courses";
            var vm=this;
            axios.post(this.$root._data.apiUrl + "selectcount.php", qs.stringify({
                sql: count,
            })).then(function (res) {
                var str=JSON.stringify(res.data[0]).replace('(*)','')
                console.log(JSON.parse(str).count)
                vm.total=Number(JSON.parse(str).count);
            }).catch(function (error) {
               
            })
        },
        handleSizeChange(val) {
            console.log(`每页 ${val} 条`);
        },
        handleCurrentChange(val) {
            console.log(`当前页: ${val}`);
            this.currentPage=val;
            this.handleSearch()
        },
        handleAdd() {
            this.$router.push({ path: '/course/addCourse.php' })
        },
        handleDelete(index, row) {
            var vm = this;
            this.$confirm('确定删除此条数据吗?', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消',
                type: 'warning'
            }).then(() => {
                axios.post(this.$root._data.apiUrl + "del.php", qs.stringify({
                    id: row.id,
                    deltype: 'courses'
                })).then(function (res) {
                    var data = res.data;
                    if (data == 1) {
                        vm.handleSearch();
                        vm.$message({
                            type: 'success',
                            message: '删除成功'
                        });
                    } else {
                        vm.$message({
                            type: 'error',
                            message: '删除失败'
                        });
                    }
                }).catch(function (error) {
                    console.log(error)
                })

            }).catch(() => {
                this.$message({
                    type: 'info',
                    message: '已取消删除'
                });
            });
        }
    }
}
</script>
<style lang="sass" rel="stylesheet/scss">
    .el-dialog__header{
        border-top: 4px solid #20A0FF;
        padding: 15px!important;
        background: #FAFAFC;
        border-bottom: 1px solid #f2f2f2;
    }
    .el-button--text{
        padding-left: 0;
        padding-right: 0;
    }
    .auditdialog {
        .el-dialog__body{
            padding: 20px 20px 0 20px;
        }
        .auditbox{
            padding: 20px 20px 0 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            .item{
                margin-bottom: 20px;
            }
        }
    }
    .el-loading-mask {
        background: rgba(0,0,0,0.7)!important;
    }
</style>

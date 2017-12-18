<!--商户通对象维护-->
<template>
    <el-row>
        <!--查询-->
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
                              placeholder="请输入任务名称"></el-input>
                </el-form-item>
                <el-form-item prop="status">
                    <el-select v-model="formInline.status"
                               clearable
                               placeholder="请选择任务状态">
                        <el-option v-for="item in statusList"
                                   :label="item.label"
                                   :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item prop="course">
                    <el-select v-model="formInline.course"
                               clearable
                               placeholder="请选择所属课程">
                        <el-option v-for="item in courseList"
                                   :label="item.title"
                                   :value="item.id">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item prop="user">
                    <el-input v-model="formInline.user"
                              placeholder="请输入用户名"></el-input>
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
            </el-button-group>
        </el-col>
        <!--表格-->
        <el-col :span="24">
            <el-table :data="tableData"
                      border
                      stripe
                      style="width: 100%"
                      height="250">
                <el-table-column fixed
                                 prop="id"
                                 label="任务ID"
                                 width="100">
                </el-table-column>
                <el-table-column prop="title"
                                 label="任务名称"
                                 width="160">
                </el-table-column>
                <el-table-column prop="username"
                                 label="用户名"
                                 width="160">
                </el-table-column>
                <el-table-column prop="userid"
                                 label="用户ID"
                                 width="160">
                </el-table-column>
                <el-table-column prop="status"
                                 label="任务状态"
                                 width="160">
                </el-table-column>
                <el-table-column prop="coursetitle"
                                 label="课程名称"
                                 width="160">
                </el-table-column>
                <el-table-column prop="num"
                                 label="题目数量"
                                 width="160">
                </el-table-column>
                <el-table-column prop="type"
                                 label="任务类型"
                                 width="160">
                </el-table-column>
                <el-table-column prop="time"
                                 label="创建时间"
                                 width="160">
                </el-table-column>
                <el-table-column inline-template
                                 :context="_self"
                                 fixed="right"
                                 label="操作"
                                 width="220">
                    <div>
                        <el-button type=""
                                   size="small"
                                   @click.native="handleChecked($index, row)">批阅</el-button>
                        <el-button type=""
                                   size="small"
                                   @click.native="handleCheck($index, row)">下架</el-button>
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
                           :total="200">
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
            courseList: [],
            formInline: {
                title: '',
                status: '',
                course: '',
                user: ''
            },
            statusList: [
                {
                    value: '未提交',
                    label: '未提交'
                }, {
                    value: '未批阅',
                    label: '未批阅'
                }, {
                    value: "已完成",
                    label: "已完成"
                }, {
                    value: "已过期",
                    label: "已过期"
                }],
        }
    },
    mounted: function () {
        this.searchCourse();
        this.handleSearch();
    },
    methods: {
        searchCourse() {
            var vm = this;
            axios.post(this.$root._data.apiUrl + "manage/selectcourse.php", qs.stringify({
                sql: "select * from courses"
            })).then(function (res) {
                if (res.data.length > 0) {
                    vm.courseList = res.data;
                }
            }).catch(function (error) {
                console.log(error)
            })
        },
        handleSearch() {
            var vm = this;
            var sql = "select * from task where 1=1 "
            if (vm.formInline.title) {
                sql += "and title like '%" + vm.formInline.title + "%' "
            }
            if (vm.formInline.status) {
                sql += "and status='" + vm.formInline.status + "' "
            }
            if (vm.formInline.course) {
                sql += "and courseid='" + vm.formInline.course + "' "
            }
            if (vm.formInline.user) {
                sql += "and username like '%" + vm.formInline.user + "%'"
            }
            this.$store.dispatch('LOAD', true);
            axios.post(this.$root._data.apiUrl + "manage/selecttask.php", qs.stringify({
                sql: sql
            })).then(function (res) {
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
        handleReset() {
            this.$refs.formInline.resetFields();
        },
        handleAdd() {
            this.$router.push({ path: '/task/taskAdd.php' })
        },
        handleCheck(index, row) {
             if(row.status=='已过期'){
                alert('任务已过期！');
                return;
            } 
            var vm = this;
            var content = '亲爱的用户，由于你长时间未进行' + row.title + '任务，该任务已被管理员下架！'
            axios.post(this.$root._data.apiUrl + "manage/check.php", qs.stringify({
                id: row.id,
                status: '已过期',
                title: '任务状态通知',
                type: '课程消息',
                content: content,
                userid: row.userid,
                username: row.username,
                time: this.getTime()
            })).then(function (res) {
                if (res.data == '1') {
                    vm.handleSearch();
                    vm.$message({
                        message: '成功',
                        type: 'success'
                    });
                } else {
                    vm.$message({
                        message: '失败',
                        type: 'error'
                    });
                }
            }).catch(function (error) {
                console.log(error)
            })
        },
        handleChecked(index, row) {
             if(row.status=='未提交'){
                alert('任务暂未提交，不能批阅！');
                return;
            }
             if(row.status=='已过期'){
                alert('任务已过期，不能批阅！');
                return;
            }
             if(row.status=='已批阅'){
                alert('任务已批阅！');
                return;
            }
            var vm = this;
            var content = '亲爱的用户，你的任务---' + row.title + '已被管理员批阅，请至我的任务查看结果！'
            axios.post(this.$root._data.apiUrl + "manage/check.php", qs.stringify({
                id: row.id,
                status: '已完成',
                title: '任务状态通知',
                type: '课程消息',
                content: content,
                userid: row.userid,
                username: row.username,
                time: this.getTime()
            })).then(function (res) {
                if (res.data == '1') {
                    vm.handleSearch();
                    vm.$message({
                        message: '成功',
                        type: 'success'
                    });
                } else {
                    vm.$message({
                        message: '失败',
                        type: 'error'
                    });
                }
            }).catch(function (error) {
                console.log(error)
            })
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
                    deltype: 'task'
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
        },
        handleSizeChange(val) {
            console.log(`每页 ${val} 条`);
        },
        handleCurrentChange(val) {
            console.log(`当前页: ${val}`);
        },
        getTime() {
            //获取当前时间
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = date.getFullYear() + seperator1 + month +

                seperator1 + strDate;
            return currentdate;
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

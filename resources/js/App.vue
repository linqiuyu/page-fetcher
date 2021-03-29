<template>
    <div>
        <el-container>
            <el-aside width="200px">
                <el-menu
                    default-active="2"
                    class="el-menu-vertical-demo"
                    router="router">
                    <el-submenu index="1">
                        <template slot="title">
                            <i class="el-icon-s-unfold"></i>
                            <span>{{ $t('rules') }}</span>
                        </template>
                        <el-menu-item index="rule">
                            <i class="el-icon-caret-right"></i>
                            <span>{{ $t('rule') }}: 1</span>
                        </el-menu-item>
                    </el-submenu>
                    <el-menu-item index="add-rule" class="add-rule-button">
                        <i class="el-icon-circle-plus"></i>
                    </el-menu-item>
                </el-menu>
            </el-aside>
            <el-main>
                <router-view></router-view>
            </el-main>
        </el-container>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>
.el-container {
    background-color: #ffffff;
    margin-right: 20px;
}

.add-rule-button {
    text-align: center;
}
</style>
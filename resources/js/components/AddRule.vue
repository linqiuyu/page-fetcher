<template>
    <div class="container">
        <el-row type="flex" class="row-bg">
            <el-form ref="form" :model="form" class="add-rule-form">
                <el-form-item :label="$t('name')">
                    <el-input v-model="form.name" :placeholder="$t('name_placeholder')"></el-input>
                </el-form-item>

                <el-divider content-position="left">{{ $t('rule_settings') }}</el-divider>
                <el-form-item v-for="rule in rules" :label="$t('post_title')">
                    <el-col :span="8">
                        <el-form-item>
                            <el-input v-model="rule.rule" placeholder="article .entry-title"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col class="line" :span="1">-</el-col>
                    <el-col :span="7">
                        <el-form-item>
                            <el-select v-model="rule.content">
                                <el-option
                                    label="text"
                                    value="text">
                                </el-option>
                                <el-option
                                    label="html"
                                    value="html">
                                </el-option>
                                <el-option
                                    label="attr"
                                    value="attr">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col class="line" :span="1" v-if="rule.content === 'attr'">-</el-col>
                    <el-col :span="7" v-if="rule.content === 'attr'">
                        <el-form-item>
                            <el-input v-model="rule.attr"></el-input>
                        </el-form-item>
                    </el-col>
                </el-form-item>

            </el-form>
        </el-row>
    </div>
</template>

<script>
export default {
    name: "AddRule",
    data() {
        return {
            form: {
                name: '',
                post_title: '',
                post_title_content: 'text',
                post_title_attr: '',
            },
            rules: {
                title: {
                    rule: '',
                    content: 'text',
                    attr: ''
                },
                content: {
                    rule: '',
                    content: 'html',
                    attr: ''
                },
                author: {
                    rule: '',
                    content: 'text',
                    attr: ''
                },
                feature_image: {
                    rule: '',
                    content: 'attr',
                    attr: 'src',
                }
            }
        };
    }
}
</script>

<style scoped>
.add-rule-form {
    width: 600px;
}

 .line {
    text-align: center;
}
</style>

<style>
.add-rule-form label {
    float: unset;
}
</style>
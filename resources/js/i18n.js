import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n)

const messages = {
    en: {
        rules: 'Rules',
        rule: 'Rule',
        name: 'Name',
        name_placeholder: 'rule name',
        rule_settings: 'Rule settings',
        post_title: 'Post title',
        post_content: 'Post content',
    },
    zh_CN: {
        rules: '规则列表',
        rule: '规则',
        name: '名称',
        name_placeholder: '规则名称',
        rule_settings: '规则配置',
        post_title: '文章标题',
        post_content: '文章内容',
    }
}

let locale = 'en';
if ( page_fetch_settings.locale in messages ) {
    locale = page_fetch_settings.locale;
}

const i18n = new VueI18n({
    locale: locale, // set locale
    messages, // set locale messages
})

export {
    i18n
};

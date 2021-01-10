<template>
  <div>
    <input
     type="hidden"
     name="tags"
     :value="tagsJson"
     >

    <vue-tags-input
      v-model="tag"
      :tags="tags"
      placeholder="タグを5個まで入力できます"
      :autocomplete-items="filteredItems"
      @tags-changed="newTags => tags = newTags"
    />
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput,
  },

  // form.blade.phpから渡されたタグ情報を表示する
  props: {
    initialTags: {
      type: Array,
      default: [],
    },

    // form.blade.phpから渡された全タグ情報をvueComponentsで自動補完にしようする
    autocompleteItems: {
      type: Array,
      default: [],
    },
  },

  data() {
    return {
      tag: '',
      tags: this.initialTags,
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    // データのtagsをJSON形式の文字列に変換したものを返す
    tagsJson() {
      return JSON.stringify(this.tags)
    },
  },
};
</script>

<style lang="css" scoped>
  .vue-tags-input {
    max-width: inherit;
  }
</style>
<style lang="css">
  .vue-tags-input .ti-tag {
    background: transparent;
    border: 1px solid #747373;
    color: #747373;
    margin-right: 4px;
    border-radius: 0px;
    font-size: 13px;
  }

  .vue-tags-input .ti-tag::before {
    content: '#';
  }
</style>
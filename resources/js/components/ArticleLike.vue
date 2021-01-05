<!-- いいね機能 -->

<template>
  <div>
    <button type="button" class="btn m-0 p-1 shadow-none">
      <i class="fas fa-heart mr-1"
        :class="{'red-text': this.isLikedBy}"></i>
    </button>
    {{ countLikes }}
  </div>
</template>

<script>
  export default {
    props: {
      initiallsLikedBy: {
        type: Boolean,
        default: false,
      },

      initialCountLikes: {
        type: Number,
        default: 0,
      },
    },
    data() {
      return {
        isLikedBy: this.initiallsLikedBy,
        countLikes: this.initialCountLikes,
      }
    },
  }
</script>
<template>
    <div class="comment-list">
        <button role="close" class="btn btn-link" @click="$emit('close')"><i class="icon-close"></i></button>
    </div>
</template>

<style>
    .comment-list {
        position: absolute;
        width: 100vw;
        height: 100vh;
        top: 0;
        overflow: hidden;
        background-color: #000; color: #FFF;
        transition: all .5s;
        padding-top: 0;
    }

    .comment-list.close {
        top: 100vh;
        height: 0;
    }

    .comment-list *[role="close"],
    .comment-list *[role="close"]:active,
    .comment-list *[role="close"]:hover {
        position: absolute;
        color: white;
        right: 10px;
        top: 10px;
        text-decoration: none;
        outline: none;
    }
</style>

<script>
    export default {
        data () {
            return {
                
            }
        },
    }
</script>

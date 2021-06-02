<template>
    <div class="blog-post">
        <h2 class="blog-post-title"><a :href="'/posts' + standing.id"></a></h2>
        <p class="blog-post-meta"> by <a href="#"></a></p>

    </div>
</template>

<script>
    export default {
        props: ['standing']
    }
    </script>
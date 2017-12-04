<template>
    <div class="sidebar">
        <section class="widget widget_categories">
            <h2 class="widget-title">Categories select</h2>
            <label class="screen-reader-text" for="cat">Categories select</label>
            <select name="cat" id="cat" class="postform">
                <option value="-1">Select Category</option>
                <option class="level-0" value="2">aciform</option>
                <option class="level-0" value="3">antiquarianism</option>
                <option class="level-0" value="4">arrangement</option>
                <option class="level-0" value="5">asmodeus</option>
                <option class="level-0" value="7">broder</option>
                <option class="level-0" value="8">buying</option>
                <option class="level-0" value="9">Cat A</option>
                <option class="level-0" value="10">Cat B</option>
            </select>
        </section>
    </div>
</template>

<script>
    export default {
        name: 'left_sidebar'
    }
</script>
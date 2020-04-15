<template>
    <form action="#" class="form">
        <div class="form__group">
            <input type="text" class="form__item" placeholder="Search listings by title, body, location, etc." id="listing-search" autocomplete="off">
        </div>
        <div id="test"></div>
    </form>
</template>

<script>


    export default {
        name: "AppSearch",
        props: [
            'categoryId',
            'areaIds'
        ],
        mounted () {

        }
    }
</script>


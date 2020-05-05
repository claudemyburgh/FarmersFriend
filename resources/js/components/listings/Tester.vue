<template>
	<div>
        <h1 class="text--info">{{pseudoSlot({ listing }) }}</h1>
        <h2 class="text--warning">
                test .
        </h2>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "Tester",
        props: ['pseudoSlot']
    }
</script>


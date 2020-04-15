<template>
    <div>
        <transition name="bounce">
            <div class="wrapper pt" v-if="notify.show" >
                <div class="row">
                    <div class="col">
                        <div class="notify" :class="notify.class" >
                            <span @click.prevent="closeNotify" class="notify__close">&times;</span>
                            {{ notify.message }}
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    export default {
        name: "NotifyAlert",
        computed: mapGetters({
            notify: 'notify/notify',
        }),
        methods: mapActions({
            closeNotify: 'notify/closeNotify'
        })
    }
</script>

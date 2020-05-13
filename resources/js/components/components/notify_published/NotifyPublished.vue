<template>
    <div>
        <div v-if="!listing.live" class="notify notify--warning shadow--2 flex justify--between flex--align-center">
            <strong>{{ notify.message  }}</strong>
            <button @click.prevent="viewPublish" type="button"  class="btn btn--white text--warning">PUBLISH</button>
        </div>
        <div v-else class="notify notify--success shadow--2 flex justify--between flex--align-center">
            <strong>Expire  {{ listing.expire_at | toNow  }}</strong>
            <button @click.prevent="viewListing" type="button"  class="btn btn--white text--success">VIEW</button>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import moment from 'moment/moment'
    export default {
        name: "NotifyPublished",
        props: {
            area: {
                required: true,
                type: Object
            }
        },
        data() {
            return {
                moment: moment
            }
        },
        filters: {
            toNow(date) {
                return moment(date).from();
            }
        },
        computed: mapGetters({
            notify: 'notify_published/notify',
            listing: 'listings/get_listing'
        }),
        methods: {
            ...mapActions({
                closeNotify: 'notify_published/closeNotify'
            }),
            viewListing() {
                window.location.href = `/${this.area.slug}/listing/${this.listing.key}`
            },
            viewPublish() {
                window.location.href = `/${this.area.slug}/dashboard/listings/${this.listing.key}/payment`
            }
        }
    }
</script>

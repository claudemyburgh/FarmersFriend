<template>
    <div>
        <div class="row flex">

            <template v-for="listing in listings" >
                <listing-panel columns="sm-col-6 md-col-4 lg-col-3" :key="listing.id" :listing="listing" :area="area">
                    <template v-slot:body>
                        <div class="flex justify--between">
                            <div class="avatar avatar__sm ">
                                <img :src="listing.user.avatar" :alt="listing.user.name">
                            </div>
                            <a :href="`/${area.slug}/listing/${listing.key}`" class="btn btn--primary">VIEW</a>
                        </div>
                    </template>
                </listing-panel>
            </template>
            <div class="observ"
                 v-if="listings.length" v-observe-visibility="{
                    callback: handleScrollToBottomOffTimeline,
                     // throttleOptions: {
                     //    leading: 'visible',
                     // },
                    throttle: 300}">
                <div v-if="!loadingComplete"  class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapActions, mapGetters, mapMutations} from "vuex";
    import ListingPanel from "./ListingPanel";
    import ListingBlankPanel from "./ListingBlankPanel";

    export default {
        name: "ListingsList",
        components: {ListingBlankPanel, ListingPanel},
        props: {
            category: {
                required: true,
                type: Object
            },
            area: {
                required: true,
                type: Object
            }
        },
        data() {
            return {
                page: 1,
                lastPage: 1,
                loadingComplete: false
            }
        },
        computed: {
            ...mapGetters({
                listings: 'listings/get_listings'
            }),
            urlWithPage() {
                return `api/${this.area.slug}/categories/${this.category.slug}/listings?page=${this.page}`
            }
        },
        methods: {
            ...mapActions({
                get_listings: 'listings/get_listings'
            }),
            ...mapMutations({
                PUSH_LISTINGS: 'listings/PUSH_LISTINGS'
            }),
            loadListings() {
                this.get_listings({url: this.urlWithPage}).then( (response) => {
                    this.lastPage = response.data.meta.last_page
                })
            },
            handleScrollToBottomOffTimeline(isVisible) {
                // if (!isVisible) { return}
                if (this.lastPage === this.page) {
                    this.loadingComplete = true
                    return
                }
                this.page++
                this.loadListings()
            }
        },
        mounted() {
            this.loadListings()

        }

    }
</script>

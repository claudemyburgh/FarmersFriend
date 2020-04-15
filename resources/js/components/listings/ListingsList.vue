<template>
  <div>
       <div class="row flex">
           <listing-card v-for="listing in listings" :key="listing.id" :listing="listing"></listing-card>

           <div class="observ"
                v-if="listings.length" v-observe-visibility="{
                    callback: handleScrollToBottomOffTimeline,
                     // throttleOptions: {
                     //    leading: 'visible',
                     // },
                    throttle: 300}">
<!--                <div v-if="!loadingComplete" class="lds-ripple"><div></div><div></div></div>-->
               <div v-if="!loadingComplete"  class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
           </div>


       </div>
  </div>
</template>

<script>

    import {mapActions, mapGetters, mapMutations} from "vuex";
    import ListingCard from "./ListingCard";

    export default {
        name: "ListingsList",
        components: {ListingCard},
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
                listings: 'listings/getListings'
            }),
            urlWithPage() {
                return `api/${this.area.slug}/categories/${this.category.slug}/listings?page=${this.page}`
            }
        },
        methods: {
            ...mapActions({
                getListings: 'listings/getListings'
            }),
            ...mapMutations({
                PUSH_LISTINGS: 'listings/PUSH_LISTINGS'
            }),
            loadListings() {
                this.getListings({url: this.urlWithPage}).then( (response) => {
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

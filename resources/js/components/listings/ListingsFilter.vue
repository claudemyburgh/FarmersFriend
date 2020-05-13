<template>
    <div>
        <div class="form__group mb-4">
            <div class="form__wrap">
                <i class="lunacon lunacon-search"></i>
                <input v-model="search" type="text" class="form__item" autofocus>
            </div>
        </div>
        <div class="row flex mb-7">
            <template v-for="listing in filteredListings">
                <new-listing-panel columns="sm-col-6 md-col-4 lg-col-3" :key="listing.id" :listing="listing" :area="area">
                    panel
                </new-listing-panel>
            </template>
        </div>

    </div>
</template>

<script>
    import {mapGetters} from "vuex/dist/vuex.esm.browser";
    import {mapActions} from "vuex";
    export default {
        name: "ListingsFilter",
        data () {
            return {
                // listings: [],
                search: ''
            }
        },
        props: {
            area: {
                required: true,
                type: Object
            },
            url: {
                required: true,
                type: String
            }
        },
        computed: {
            ...mapGetters({
                listings: 'listings/get_listings'
            }),
            filteredListings () {
                let count = 0
                return this.listings.filter( (listing) => {
                    return listing.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
        methods: {
            ...mapActions({
                get_listings: 'listings/get_listings'
            }),
        },
        mounted() {
            this.get_listings({
                url: this.url
            })
        }
    }
</script>

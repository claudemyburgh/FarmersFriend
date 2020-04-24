<template>
  <div>
      <h1>Published Listings</h1>

      <div class="form__group">
          <div class="form__wrap">
              <i class="lunacon lunacon-search"></i>
              <input v-model="search" type="text" class="form__item" autofocus>
          </div>
      </div>
      <div v-for="listing in filteredListings" class="flex shadow--2 bg--white p--xs">
          <img v-if="typeof (listing.images[0]) !== 'undefined' "  height="60" :src="listing.images[0].type.icon" :alt="listing.title">
          <div>
              <header><strong>{{ listing.title }}</strong> {{ `/${area.slug}/listing/${listing.key}/edit`}}</header>
              <a href="`/${area.slug}/listing/${listing.key}/edit`">Edit</a>
          </div>
      </div>

<!--      <pre>{{filteredListings}}</pre>-->

  </div>
</template>

<script>
    export default {
        name: "ListingsFilter",
        data () {
            return {
                listings: [],
                search: ''
            }
        },
        props: {
            area: {
                required: true,
                type: Object
            }
        },
        computed: {
            filteredListings () {
                let count = 0
                return this.listings.filter( (listing) => {
                    return listing.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
        methods: {
            getListing () {
                return axios.get(`/api/listings/published`).then( (response) => {
                    this.listings =  response.data.data
                })
            }
        },
        mounted() {
            this.getListing()
        }
    }
</script>


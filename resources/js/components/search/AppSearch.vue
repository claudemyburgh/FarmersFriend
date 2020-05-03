<template>
	<div>
		<ais-index index-name="listings" :search-store="searchStore">
			<div class="form__group">
				<div class="form__wrap py-3">
					<span class="pt-2"><img width="25" src="/img/icons/algolia-blue-mark.svg" alt="Algolia search"></span>
					<ais-input class="form__item" placeholder="Search Listing" />
					<a @click.prevent="clearForm" v-if="searchIsNotEmpty" href="#" class="p-2 mx-3">&times;</a>
				</div>
			</div>
			<template v-if="searchIsNotEmpty">
				<ais-results class="panel shadow--7" :results-per-page="10" :stack="true">
					<template slot-scope="{ result }">
                        <ul class="panel__list">
                            <li class="list__item ">
                                <a class="flex-i justify--between" :href="`/${area.slug}/listing/${result.key}`"><strong>{{ result.title }} </strong> <small class="text--primary">in {{ result.area.name }}</small></a>
                            </li>
                        </ul>
					</template>
				</ais-results>
				<ais-no-results>
					<div class="panel shadow--1">
						<div class="panel__header">
							Hmm, Sorry no result found.
						</div>
					</div>
				</ais-no-results>
				<loader-dots v-if="searchStore.results.length"
										 v-observe-visibility="{
                        callback: incrementPage,
                        // throttle: 200
                    }"
				/>
			</template>
		</ais-index>
	</div>
</template>
<script>
    import {createFromAlgoliaCredentials } from 'vue-instantsearch';
    export default {
        name: "AppSearch",
        props: {
            area: {
                required: true,
                type: Object
            }
        },
        data () {
            return {
                searchStore: null
            }
        },
        methods: {
            incrementPage(visible) {
                if (visible) {
                    const params = this.searchStore.queryParameters

                    this.searchStore.queryParameters = Object.assign({},params,{
                        page: params.page + 1
                    })
                }
            },
            clearForm() {
                this.searchStore._helper.state.query = ''
            }
        },
        computed: {
            searchIsNotEmpty() {
                if (!this.searchStore) {
                    return false
                }
                return this.searchStore._helper.state.query.length > 2
            }
        },
        created() {
            this.searchStore = createFromAlgoliaCredentials('IGWPQRZ1XN', '059740f1b58f8395fa32bbaf13f9d689')

            this.searchStore.queryParameters = {
                page: 1
            }
        }

    }
</script>


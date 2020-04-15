<template>
    <div class="panel shadow--1">
        <div class="panel__header">Create listing</div>
        <div class="panel__body">
            <form @submit.prevent="submitForm" method="post" novalidate>

                <div class="form__group" :class="errors.title ? 'has__danger' : ''">
                    <label for="title" class="form__label font--bold">Title</label>
                    <input type="text" v-model="listing.title" id="title" class="form__item" @focus.prevent="errors.title = null" >
                    <div v-if="errors.title" class="form__helper">
                        {{ errors.title[0] }}
                    </div>
                </div>

                <div class="form__group" @click.prevent="errors.category_id = null"  :class="errors.category_id ? 'has__danger' : ''">
                    <label for="category_id" class="form__label font--bold">Category</label>
                    <categories-dropdown></categories-dropdown>
                    <div class="form__helper" v-if="errors.category_id">
                        {{ errors.category_id[0]}}
                    </div>
                </div>

                <area-dropdown></area-dropdown>

                <div class="row">
                    <div class="form__group md-col-8" :class="errors.url ? 'has__danger' : ''">
                        <label for="url" class="form__label font--bold">URL to website</label>
                        <input type="text" v-model="listing.url" id="url" class="form__item"  >
                        <div v-if="errors.url" class="form__helper">
                            {{ errors.url[0] }}
                        </div>
                    </div>

                    <div class="form__group md-col-4" :class="errors.price ? 'has__danger' : ''">
                        <label for="price" class="form__label font--bold">Price</label>
                        <input type="number" v-model="listing.price" id="price" class="form__item" @focus.prevent="errors.price = null" >
                        <div v-if="errors.price" class="form__helper">
                            {{ errors.price[0] }}
                        </div>
                    </div>
                </div>

                <div class="form__group" :class="errors.body ? 'has__danger' : ''">
                    <label for="body" class="form__label font--bold">Body</label>
                    <resize-textarea  name="body" v-model="listing.body"></resize-textarea>
                    <div v-if="errors.body" class="form__helper">
                        {{ errors.body[0] }}
                    </div>
                </div>

                <div class="form__group" v-if="!status" >
                    <button type="submit" class="btn btn--primary">Save</button>
                </div>
                <div class="form__group" v-else>
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
<!--                    <button class="btn btn&#45;&#45;primary">Saving <span class="mini-loader"></span></button>-->
                </div>

            </form>
        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import AreaDropdown from "./components/area/AreaDropdown";
    import ResizeTextarea from "../components/textarea/ResizeTextarea";
    import CategoriesDropdown from "./components/categories/CategoriesDropdown";

    export default {
        name: "CreateListing",
        components: {CategoriesDropdown, ResizeTextarea, AreaDropdown},
        props: {
            area: {
                required: true,
                type: Object
            }
        },
        computed: {
            ...mapGetters({
                listing: 'listings/getListing',
                errors: 'listings/getListingErrors',
                status: 'listings/getProcessingStatus'
            })
        },
        methods: {
            ...mapActions({
                createListing: 'listings/createListing'
            }),
            submitForm() {
                this.createListing({
                    listing: this.listing,
                    area: this.area
                })
            }
        }

    }
</script>


<template>

    <div class="panel shadow--2">
        <div class="panel__header flex justify--between">Edit Listing</div>
        <div class="panel__body">
            <form-base>
                <div class="row">
                    <div class="form__group md-col-8" :class="errors.url ? 'has__danger' : ''">
                        <label for="url" class="form__label font--bold">URL to website</label>
                        <div class="form__wrap">
                            <i class="lunacon lunacon-paper-clip"></i>
                            <input type="text" v-model="listing.url" id="url" class="form__item"  >
                        </div>
                        <div v-if="errors.url" class="form__helper">
                            {{ errors.url[0] }}
                        </div>
                    </div>

                    <div class="form__group md-col-4" :class="errors.price ? 'has__danger' : ''">
                        <label for="price" class="form__label font--bold">Price</label>
                        <div class="form__wrap">
                            <i class="font--bold">R</i>
                            <input type="text" v-model="listing.price" id="price" class="form__item" @focus.prevent="errors.price = null" />
                        </div>
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


            </form-base>

            <div class="form__group flex justify--between" v-if="!status" >
                <button @click.prevent="submitForm" type="submit" class="btn btn--primary">UPDATE</button>
                <button v-if="!listing.live" @click.prevent="publishForm" type="button"  class="btn btn--dark">PUBLISH</button>
            </div>
            <div class="form__group" v-else>
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </div>

        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import DropZone from "../components/dropzone/DropZone";
    import FormBase from "./FormBase";
    export default {
        name: "EditListing",
        components: {FormBase, DropZone},
        props: {
            area: {
                required: true,
                type: Object
            },
            listingObject: {
                required: true,
                type: Object
            },
        },
        computed: {
            ...mapGetters({
                listing: 'listings/get_listing',
                errors: 'listings/get_listing_errors',
                status: 'listings/get_processing_status'
            }),
            price() {
                return (this.listing.price) ? parseInt(this.listing.price) : null
            }
        },
        methods: {
            ...mapActions({
                set_listing: 'listings/set_listing',
                set_province: 'listings/set_province',
                update_listing: 'listings/update_listing',
            }),
            setListing() {
                this.set_listing({
                    listing: this.listingObject
                })
            },
            submitForm() {

                this.update_listing({
                    listing: this.listing,
                    area: this.area
                }).then( ({status}) => {
                    this.$vToastify.success({
                        title: 'Success',
                        body: "Listing saved"
                    });


                    if (status === 200) {
                    }
                }).catch( (error) => {
                    this.$vToastify.error({
                        title: "Error",
                        body: "Sorry something went wrong!"
                    });

                })
            },
            publishForm() {

                this.update_listing({
                    listing: this.listing,
                    area: this.area
                }).then( ({status}) => {
                    this.$vToastify.success({
                        title: 'Success',
                        body: "Publish Listing"
                    });
                    if (status === 200) {
                        window.location.href = `/${this.area.slug}/dashboard/listings/${this.listing.key}/payment`
                    }
                }).catch( (error) => {
                    this.$vToastify.error({
                        title: "Error",
                        body: "Sorry something went wrong!"
                    });
                })
            }
        },
        created() {
            this.setListing()
        }
    }
</script>

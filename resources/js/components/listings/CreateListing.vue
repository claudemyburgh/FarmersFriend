<template>
    <div class="panel shadow--1">
        <div class="panel__header">Create listing</div>
        <div class="panel__body">
            <form @submit.prevent="submitForm" method="post" novalidate>
                <form-base></form-base>
                <div class="form__group" v-if="!status">
                    <button type="submit" class="btn btn--primary">CREATE</button>
                </div>
                <div class="form__group" v-else>
                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import FormBase from "./FormBase";

    export default {
        name: "CreateListing",
        components: {FormBase},
        props: {
            area: {
                required: true,
                type: Object
            }
        },
        computed: {
            ...mapGetters({
                listing: 'listings/get_listing',
                errors: 'getValidationErrors',
                status: 'listings/get_processing_status'
            })
        },
        methods: {
            ...mapActions({
                get_listing: 'listings/get_listing',
                create_listing: 'listings/create_listing',
            }),
            submitForm() {
                this.$Progress.start()
                const loader = this.$vToastify.loader("Please Wait...")
                this.create_listing({
                    listing: this.listing,
                    area: this.area
                }).then( (response) => {
                    this.$Progress.finish()
                    this.$vToastify.removeToast(loader)
                    this.$vToastify.success({
                        title: 'Success',
                        body: 'Listing created'
                    });
                }).catch( (error) => {
                    this.$Progress.fail()
                    this.$vToastify.removeToast(loader)
                    this.$vToastify.error({
                        title: 'Error',
                        body: error.response.data.message
                    });
                })
            }
        }
    }
</script>


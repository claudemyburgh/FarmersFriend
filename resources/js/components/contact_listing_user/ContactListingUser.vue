<template>
    <form @submit.prevent="postMessage" method="post">
        <div class="form__group" :class="errors.message ? 'has__danger' : ''">
            <label for="message" class="form__label font--bold">Message</label>
            <resize-textarea @focus.prevent="errors.message = null" name="message" v-model="listingMessage.message" ></resize-textarea>
            <div v-if="errors.message" class="form__helper">
                {{ errors.message[0] }}
            </div>
        </div>
        <div class="form__group" v-if="!processing" >
            <button type="submit" class="btn btn--primary">SEND MESSAGE</button>
        </div>
        <div class="form__group" v-else>
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>

        </div>
    </form>
</template>

<script>

    import {mapActions, mapGetters} from "vuex";
    import ResizeTextarea from "../components/textarea/ResizeTextarea";

    export default {
        name: "ContactListingUser",
        components: {ResizeTextarea},
        props: [
            "listing"
        ],
        computed: mapGetters({
            listingMessage: 'contactUser/getListingFormMessage',
            processing: 'contactUser/processing',
            errors: 'contactUser/getErrors',
        }),
        methods: {
            ...mapActions({
                sendMessage: 'contactUser/sendMessage'
            }),
            postMessage() {
                this.$Progress.start()
                const loader = this.$vToastify.loader("Please Wait...")
                this.sendMessage({
                    listing: this.listing.key,
                    form: this.listingMessage
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


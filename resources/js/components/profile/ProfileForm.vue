<template>
	<div>
        <div class="row">
            <div class="form__group lg-col-6" :class="errors.first_name ? 'has--danger' : ''">
                <label for="first_name" class="form__label font--bold">First Name</label>
                <div class="form__wrap">
                    <i class="lunacon lunacon-user-solid"></i>
                    <input @focus.prevent="errors.first_name = null" type="text" id="first_name" v-model="user.first_name"  class="form__item">
                </div>
                <div v-if="errors.first_name" class="form__helper">
                    {{ errors.first_name[0] }}
                </div>
            </div>
            <div class="form__group lg-col-6" :class="errors.last_name ? 'has--danger' : ''">
                <label for="last_name" class="form__label font--bold">Last Name</label>
                <div class="form__wrap">
                    <i class="lunacon lunacon-user-solid"></i>
                    <input @focus.prevent="errors.last_name = null" type="text" id="last_name" v-model="user.last_name"  class="form__item">
                </div>
                <div v-if="errors.last_name" class="form__helper">
                    {{ errors.last_name[0] }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form__group lg-col-6" :class="errors.email ? 'has--danger' : ''">
                <label for="email" class="form__label font--bold">Email</label>
                <div class="form__wrap">
                    <i class="lunacon lunacon-mail-envelope"></i>
                    <input @focus.prevent="errors.email = null"  disabled type="text" id="email" v-model="user.email"  class="form__item">
                </div>
                <div v-if="errors.email" class="form__helper">
                    {{ errors.email[0] }}
                </div>
            </div>
            <div class="form__group lg-col-6" :class="errors.phone ? 'has--danger' : ''">
                <label for="phone" class="form__label font--bold">Phone</label>
                <div class="form__wrap">
                    <i class="lunacon lunacon-dailer-solid"></i>
                    <input @focus.prevent="errors.phone = null" type="text" id="phone" v-model="user.phone"  class="form__item">
                </div>
                <div v-if="errors.phone" class="form__helper">
                    {{ errors.phone[0] }}
                </div>
            </div>
        </div>

        <div class="bg--dark-light r-3 mb-4">
            <div class="switch lg-col-6 px-2 py-2">
                <input type="checkbox" id="show_email" v-model="user.show_email"  class="switch__input">
                <label for="show_email" class="switch__label">Email Address <span class="toggle--on">Show</span><span class="toggle--off">Hide</span></label>
            </div>
            <div class="row">
                <div class="switch lg-col-6 px-2 py-2">
                    <input type="checkbox" id="show_phone" v-model="user.show_phone"  class="switch__input">
                    <label for="show_phone" class="switch__label">Phone Number <span class="toggle--on">Show</span><span class="toggle--off">Hide</span></label>
                </div>

            </div>
        </div>
        <div class="form__helper">
            Show contact details on your listing and profile page.
        </div>
        <div @click.prevent="errors.bio = null" class="form__group" :class="errors.bio ? 'has--danger' : ''">
            <label for="bio" class="form__label font--bold">Bio</label>
            <resize-textarea name="bio" v-model="user.bio"></resize-textarea>
        </div>

        <div class="form__group" v-if="!processing">
            <button @click.prevent="submit" class="btn btn--primary">Update</button>
        </div>
        <div class="form__group" v-else>
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "ProfileForm",
        computed: {
            ...mapGetters({
                user: 'user/get_user',
                errors: 'user/get_errors',
                processing: 'user/get_processing'
            })
        },
        methods: {
            ...mapActions({
                update: 'user/set_user',
                get_user: 'user/get_user',
            }),
            submit() {
                this.update({
                    user: this.user
                })
            }
        }
    }
</script>



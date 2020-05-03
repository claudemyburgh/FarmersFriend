
<template>
    <div>

        <div class="panel shadow--3">
            <div class="panel__header flex justify--between">
                <h2><avatar-nav></avatar-nav></h2>
                <div class="switch">
                    <input type="checkbox" id="editing" v-model="editing"  class="switch__input">
                    <label for="editing" class="switch__label">Edit profile <span class="toggle--on"></span><span class="toggle--off"></span></label>
                </div>
            </div>
            <template v-if="typeof user.email !== 'undefined'">
                <div v-if="!editing" class="panel__body">
                    <div class="row">
                        <div class="md-col-6 mb-5">
                            <div class="border--mute p-4 r-3">
                                <template v-if="user.first_name">{{ user.first_name}}</template>
                                <template v-else> <span class="text--danger">No first name</span></template>
                            </div>
                        </div>
                        <div class="md-col-6 mb-5">
                            <div class="border--mute p-4 r-3">
                                <template v-if="user.last_name">{{ user.last_name}}</template>
                                <template v-else> <span class="text--danger">No last name</span></template>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="md-col-6 mb-5">
                            <div class="border--mute p-4 r-3">
                                <template v-if="user.email">{{ user.email}}</template>
                                <template v-else> <span class="text--danger">No email address</span></template>
                            </div>
                        </div>
                        <div class="md-col-6 mb-5">
                            <div class="border--mute p-4 r-3">
                                <template v-if="user.phone">{{ user.phone}}</template>
                                <template v-else> <span class="text--danger">No phone number</span></template>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-5">
                            <div class="border--info text--info bg--info-light p-4 r-3">
                                Your <strong v-if="user.show_phone || user.show_email === user.show_phone">phone number</strong>
                                <span v-if="user.show_email === user.show_phone">and </span>
                                <strong v-if="user.show_email || user.show_email === user.show_phone"> email address </strong> will be
                                <strong v-if="user.show_phone">visable</strong>
                                <strong class="text--danger" v-else>hidden</strong> to website visitors.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="md-col-12 mb-5">
                            <div class="border--mute p-4 r-3">
                                <template v-if="user.bio">
                                    {{ user.bio}}
                                </template>
                                <template v-else>
                                    No bio
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="panel__body">
                    <profile-form></profile-form>
                </div>
            </template>

        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import ResizeTextarea from "../components/textarea/ResizeTextarea";
    import ProfileForm from "./ProfileForm";
    import AvatarNav from "./components/AvatarNav";

    export default {
        name: "UserProfile",
        components: {AvatarNav, ProfileForm, ResizeTextarea},
        data() {
            return {
                editing: false
            }
        },
        computed: {
            ...mapGetters({
                user: 'user/get_user',
                errors: 'user/get_errors',
                processing: 'user/get_processing'
            }),
            fullName() {
                return this.user.first_name + ' ' + this.user.last_name
            }
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
        },
        beforeMount() {
            this.get_user()
        }


    }
</script>

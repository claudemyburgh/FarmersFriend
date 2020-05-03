<template>
	<div>
        <template  v-if="typeof user.first_name !== 'undefined'">
        <img :src="user.avatar" class="avatar__nav">
        {{ fullName }}
        </template>
        <template v-else>
            Loading...
        </template>
    </div>
</template>

<script>
    import { mapGetters} from "vuex";

    export default {
        name: "AvatarNav",
        computed: {
            ...mapGetters({
                user: 'user/get_user',
            }),
            fullName() {
                return this.user.first_name + ' ' + this.user.last_name
            }
        }
    }
</script>


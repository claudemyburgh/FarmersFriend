<template>
    <div :class="columns">
        <div class="panel shadow--2 mb-6">
            <picture v-if="typeof (listing.images[0]) !== 'undefined'">
                <source media="(max-width: 320px)" :srcset="listing.images[0].type.icon">
                <source media="(max-width: 600px)" :srcset="listing.images[0].type.thumb">
                <img class="panel__img" :src="listing.images[0].type.thumb_big" :alt="listing.title">
            </picture>
            <picture v-else class="bg--mute">
                <source media="(max-width: 320px)" srcset="/img/placeholder/no-photo_icon.svg">
                <source media="(max-width: 600px)" srcset="/img/placeholder/no-photo_thumb.svg">
                <img class="panel__img" src="/img/placeholder/no-photo_thumb_big.svg" alt="No Image">
            </picture>


            <div class="panel__header">
                <div class="ellipsis">
                    <a class="ellipsis block " :href="`/${area.slug}/listing/${listing.key}`">{{ listing.title }}</a>
                </div>
                <div class="flex justify--between mt-2">
                    <div class="flex flex--center text--gray">
                        <i class="lunacon lunacon-heart mr-3"></i>
                        <i class="lunacon lunacon-thumbs-up mr-3"></i>
                        <i class="lunacon lunacon-twitter-bird mr-3"></i>
                    </div>
                    <strong v-if="listing.price" class="panel__price">R {{ listing.price}}</strong>
                </div>
            </div>
            <div class="panel__body">
                <slot name="body" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListingPanel",
        props: {
            listing: {
                required: true,
                type: Object
            },
            area: {
                required: true,
                type: Object
            },
            columns: {
                required: true,
                type: String
            }
        }
    }
</script>

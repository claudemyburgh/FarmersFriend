<template>
    <div :class="columns">
        <div class="panel shadow--1 mb-6">
            <a :href="`/${area.slug}/listing/${listing.key}`">
                <div class="panel__picture">
                    <picture class="panel__pic" v-if="typeof (listing.images[0]) !== 'undefined'">
                        <source media="(max-width: 320px)" :srcset="listing.images[0].type.icon">
                        <source media="(max-width: 600px)" :srcset="listing.images[0].type.thumb">
                        <img class="panel__img panel__picture" :src="listing.images[0].type.thumb_big" :alt="listing.title">
                    </picture>
                    <picture v-else class="bg--mute panel__pic">
                        <source media="(max-width: 320px)" srcset="/img/placeholder/no-photo_icon.svg">
                        <source media="(max-width: 600px)" srcset="/img/placeholder/no-photo_thumb.svg">
                        <img class="panel__img" src="/img/placeholder/no-photo_thumb_big.svg" alt="No Image">
                    </picture>
                </div>

            </a>
            <div class="panel__header">
                <div class="ellipsis">
                    <a class="ellipsis block " :href="`/${area.slug}/listing/${listing.key}`">{{ listing.title }}</a>
                </div>
                <div class="flex justify--between mt-2">
                    <strong v-if="listing.price" class="panel__price">R {{ listing.price | currency}}</strong>
                    <strong v-else class="panel__price">N/A</strong>

                    <div class="flex flex--center text--gray">
                        <i class="lunacon lunacon-heart ml-3 xs-float-right"></i>
                    </div>
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
        name: "NewListingPanel",
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

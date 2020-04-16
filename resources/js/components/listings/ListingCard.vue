<template>
    <div class="sm-col-6 md-col-4 lg-col-3 flex">
        <section class="listing flex">

            <picture v-if="typeof (listing.images[0]) !== 'undefined' " class="listing__pic shadow--6">
<!--                <source media="(min-width: 600px)" :srcset="listing.images[0].type.thumb_big">-->
                <img class="listing__img" :src="listing.images[0].type.thumb_big" :alt="listing.title">
            </picture>
            <picture v-else class="listing__pic shadow--6">
                <source media="(min-width: 600px)" srcset="http://lorempixel.com/400/200">
                <img class="listing__img" src="http://lorempixel.com/400/200" alt="No Image">
            </picture>
            <article class="listing__article shadow--4 flex flex--grow">
                <div class="avatar avatar__sm listing__avatar">
                    <img :src="listing.user.avatar" :alt="listing.user.name">
                </div>
                <header class="listing__header ">
                    <a class="ellipsis block" :href="`/${listing.area.slug}/${listing.key}`">{{ listing.title }}</a>
                </header>
                <div class="listing__footer flex flex--row justify--between">

                </div>
            </article>
        </section>
    </div>
</template>

<script>
    export default {
        name: "ListingCard",
        props: {
            listing: {
                required: true,
                type: Object

            }
        }
    }
</script>


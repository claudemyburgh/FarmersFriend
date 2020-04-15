<template>
    <div class="sm-col-6 md-col-4 lg-col-3 flex">
        <section class="listing flex">
            <picture class="listing__pic shadow--6">
                <source media="(min-width: 600px)" srcset="https://picsum.photos/seed/picsum/400/230">
                <img class="listing__img" src="https://picsum.photos/seed/picsum/400/230" alt="">
            </picture>
            <article class="listing__article shadow--4 flex flex--grow">
                <div class="avatar avatar__sm listing__avatar">
                    <img :src="listing.user.avatar" :alt="listing.user.name">
                </div>
                <header class="listing__header ">
                    <a class="ellipsis block" :href="`/${listing.area.slug}/${listing.key}`">{{ listing.title }}</a>
                </header>
                <div class="listing__footer flex flex--row justify--between">
                    lorem
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


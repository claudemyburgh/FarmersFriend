<template>
    <div class="form__group" @click.prevent="errors.category_id = null"  :class="errors.category_id ? 'has__danger' : ''">
        <label for="category_id" class="form__label font--bold">Category</label>
        <div class="form__wrap">
            <select id="category_id" class="form__item" v-model="listing.category_id">
                <optgroup v-for="category in categories" :label="category.name">
                    <option v-for="sub in category.children" :value="sub.id">{{ sub.name}}</option>
                </optgroup>
            </select>
        </div>
        <div class="form__helper" v-if="errors.category_id">
            {{ errors.category_id[0]}}
        </div>
    </div>

</template>

<script>


    import {mapGetters, mapActions} from "vuex";

    export default {
        name: "CategoriesDropdown",
        computed: {
            ...mapGetters({
                categories: 'categories/getCategories',
                listing: 'listings/getListing',
                errors: 'listings/getListingErrors',
            })
        },
        methods: {
            ...mapActions({
                setCategories: 'categories/setCategories'
            })
        },
        created() {
            this.setCategories()
        }
    }
</script>

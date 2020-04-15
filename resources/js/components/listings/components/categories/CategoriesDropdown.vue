<template>
    <div>
        <select name="category_id" id="category_id" class="form__item" v-model="listing.category_id">
            <optgroup v-for="category in categories" :label="category.name">
                <option v-for="sub in category.children" :value="sub.id">{{ sub.name}}</option>
            </optgroup>
        </select>
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

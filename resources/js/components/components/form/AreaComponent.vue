<template>
    <div>
        <div class="row">
            <div class="form__group md-col-6">
                <label for="province_id" class="form__label">Province</label>
                <select name="province_id" id="province_id">
                    <option value="">Select Area</option>
                </select>
            </div>
            <div class="form__group md-col-6">
                <label for="province_id" class="form__label">City</label>
                <select name="area_id" id="area_id">
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AreaComponent",
        props: {
            area: {
                type: Object,
                required: true
            }
        },
        methods: {

        },
        mounted() {

        }
    }
</script>


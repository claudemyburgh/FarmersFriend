<template>
    <div :class="columns">
        <div class="panel shadow--2 mb-6">


            <div class="panel__placeholder panel__placeholder--image"></div>


            <div class="panel__header">
                <div class="ellipsis ">
                    <div class="panel__placeholder panel__placeholder--90 mb-2"></div>
                </div>
                <div class="flex justify--between mt-2">
                    <div class="panel__placeholder panel__placeholder--half"></div>
                    <div class="flex flex--center text--gray">
                        <i class="lunacon lunacon-heart-solid ml-3 xs-float-right"></i>
                    </div>
                </div>
            </div>
            <div class="panel__body">
                <div class="flex justify--between">
                <div class="panel__placeholder panel__placeholder--avatar"></div>
                <div class="btn btn--gray text--gray">View</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListingBlankPanel",
        props: {
            columns: {
                required: true,
                type: String
            }
        }
    }
</script>

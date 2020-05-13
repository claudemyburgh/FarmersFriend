<template>
    <div>
        <sortable-list v-model="data">
            <ul class="list" slot-scope="{ items }">
                <sortable-item  v-for="item in items" :key="item.id">
                    <sortable-handle>
                        <li class="list__item bg--white flex justify--between">
                            <a href="#">{{ item.title }}</a> <i class="lunacon lunacon-grid text--gray-light"></i>
                        </li>
                    </sortable-handle>

                </sortable-item>
            </ul>
        </sortable-list>
    </div>
</template>

<script>

    import SortableList from "./SortableList";
    import SortableItem from "./SortableItem";
    export default {
        name: "SortableComponent",
        components: {SortableItem, SortableList},
        data() {
            return {
                data: [
                    {id: 1, title: 'lorem 1'},
                    {id: 2, title: 'lorem 2'},
                    {id: 3, title: 'lorem 3'},
                    {id: 4, title: 'lorem 4'},
                    {id: 5, title: 'lorem 5'},
                    {id: 6, title: 'lorem 6'},
                    {id: 7, title: 'lorem 7'},
                ]
            }
        }
    }

</script>

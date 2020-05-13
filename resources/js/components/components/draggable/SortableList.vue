
<script>
    import { Sortable } from '@shopify/draggable'

    function move(items, oldIndex, newIndex) {
        const itemRemovedArray = [
            ...items.slice(0, oldIndex),
            ...items.slice(oldIndex + 1, items.length)
        ]

        return [
            ...itemRemovedArray.slice(0, newIndex),
            items[oldIndex],
            ...itemRemovedArray.slice(newIndex, itemRemovedArray.length)
        ]
    }

    export default {
        name: "SortableList",
        props: {
            value: {
                required: true
            },
            itemClass: {
                default: 'sortable__item'
            },
            handleClass: {
                default: 'sortable__handle'
            }
        },
        render() {
            return this.$scopedSlots.default({
                items: this.value
            })
        },
        provide() {
            return {
                itemClass: this.itemClass,
                handleClass: this.handleClass
            }
        },
        mounted() {
            new Sortable(this.$el, {
                draggable: `.${this.itemClass}`,
                handle: `.${this.handleClass}`,
                mirror: {
                    constrainDimensions: true
                }
            }).on('sortable:stop', ({oldIndex, newIndex}) => {
                this.$emit('input', move(this.value, oldIndex, newIndex))
            })
        }
    }
</script>


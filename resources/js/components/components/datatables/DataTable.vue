<template>

<div>
    <template v-if="response.allow.creation">
        <div class="panel shadow--1" >
            <div class="panel__header">
                <a class="btn btn--primary-gradient" href="#" @click.prevent="creating.active = !creating.active">
                    {{ creating.active ? "Cancel" : `Create ${response.table}`  }}
                </a>
            </div>
        </div>
        <div class="modal__holder" v-if="creating.active" >
            <div class="modal">
                <div class="modal__header">{{ response.modal_text }}</div>
                <div class="modal__body">
                    <form action="#" @submit.prevent="store">
                        <div class="form__group" v-for="column in response.updatable" :class="{ 'has__danger': creating.errors[column] }">

                            <div v-if="response.form_field_type[column] === 'text'">
                                <label :for="column" class="form__label font--bold">{{ response.custom_columns[column] || column.toUpperCase() }}</label>
                                <div class="form__wrap">
                                    <input :type="response.form_field_type[column] === 'textarea' ? 'text' : response.form_field_type[column]  " :id="column" class="form__item" v-model="creating.form[column]">

                                </div>
                            </div>

                            <div v-if="response.form_field_type[column] === 'date'">
                                <label :for="column" class="form__label font--bold">{{ response.custom_columns[column] || column.toUpperCase() }}</label>
                                <div class="form__wrap">
                                    <input :type="response.form_field_type[column] === 'date' ? 'text' : response.form_field_type[column]  " :id="column" class="form__item" v-model="creating.form[column]">
                                </div>
                            </div>

                            <div v-if="response.form_field_type[column] === 'textarea'">
                                <label :for="column" class="form__label font--bold">{{ response.custom_columns[column] || column.toUpperCase() }}</label>
                                <div class="form__wrap">
                                    <textarea :id="column" class="form__item" cols="30" rows="6" v-model="creating.form[column]"></textarea>
                                </div>
                            </div>

                            <div v-if="response.form_field_type[column] === 'check'">
                                <div class="form__group__checkbox">
                                    <input type="checkbox" :name="column" :id="column" class="form__checkbox" :checked="creating.active ? 'checked' : '' "  v-model="creating.form[column]"/>
                                    <label :for="column" class="from__label__checkbox">{{ response.custom_columns[column] || column.toUpperCase() }}</label>
                                </div>
                            </div>


                            <span class="form__helper" v-if="creating.errors[column]">
                              {{ creating.errors[column][0] }}
                                              </span>
                        </div>
                        <div class="form__group text--danger">
                            <button type="submit" class="btn btn--primary-gradient">Create</button>
                        </div>
                    </form>
                </div>
                <div class="modal__close background--danger color--white border--danger" @click.prevent="creating.active = !creating.active"></div>
            </div>
            <div class="modal__overlay" @click.prevent="creating.active = !creating.active" v-if="creating.active"></div>
        </div>
    </template>
    <template v-if="response.allow.searchable">
        <div class="panel panel--default" v-if="!creating.active">
            <div class="panel__header" v-if="hide.header"><h2 class="toUpperCase">{{ response.table }}</h2></div>
            <div class="panel__body">
                <div class="row">
                    <div class="col"><label for="search" class="form__label font--bold">Search</label></div>
                </div>
                <form action="#" @submit.prevent="getRecords">
                    <div class="row">
                        <div class="md-col-3 form__group">
                            <div class="form__wrap">
                                <select  class="form__item" v-model="search.column">
                                    <option :value="column" v-for="column in response.displayable" >{{ column }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="md-col-3 form__group">
                            <div class="form__wrap">
                                <select class="form__item" v-model="search.operator">
                                    <option value="equels">Equels</option>
                                    <option value="contains">Contains</option>
                                    <option value="starts_with">Starts With</option>
                                    <option value="ends_with">Ends With</option>
                                    <option value="greater_than">Greater Than</option>
                                    <option value="less_than">Less Than</option>
                                </select>
                            </div>
                        </div>

                        <div class="md-col-6 form__group">
                            <div class="form__item__group">
                                <div class="form__wrap">
                                    <i class="lunacon lunacon-search"></i>
                                    <input class="form__item" type="search" id="search" v-model="search.value">
                                </div>
                                <button type="submit" class="btn btn--primary-gradient">Search</button>

                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="md-col-10 form__group">
                        <label for="filter" class="form__label font--bold">Quick search current results</label>
                        <div class="form__wrap">
                            <i class="lunacon lunacon-search"></i>
                            <input type="text" id="filter" class="form__item" v-model="quickSearchQuery">
                        </div>
                    </div>
                    <div class="md-col-2 form__group">
                        <label for="limit" class="form__label font--bold">Display records</label>
                        <div class="form__wrap">
                            <select name="limit" id="limit" class="form__item" v-model="limit" @change.prevent="getRecords">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1000">1000</option>
                                <option value="">All</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <div class="panel panel--default">
        <div class="panel__header" v-if="selected.length">
            <a class="btn btn--danger" href="#" @click.prevent="destroy(selected)">Delete</a>
        </div>
        <div class="table__responsive">
            <table class="table table--hover">
                <thead class="table__head">
                <tr>
                    <th v-if="canSelectItems && response.allow.deletion">
                        <input
                            :checked="filteredRecords.length === selected.length"
                            type="checkbox"
                            @change="toggleSelectAll">

                    </th>
                    <th v-for="column in response.displayable">
                        <span class="sortable" @click="sortBy(column)"> {{ response.custom_columns[column] || column.toUpperCase() }}</span>
                        <div
                            class="arrow"
                            v-if="sort.key === column"
                            :class="{ 'arrow--asc': sort.order === 'asc', 'arrow--desc': sort.order === 'desc'}"
                        ></div>
                    </th>
                    <th style="text-align: right">Actions</th>

                </tr>
                </thead>
                <tbody class="table__body">
                <tr v-for="records in filteredRecords">
                    <td v-if="canSelectItems && response.allow.deletion">
                        <input type="checkbox" v-model="selected" :value="records.id">
                    </td>
                    <td :data-title="column" v-for="columnValue, column in records">
                        <template v-if="editing.id === records.id && isUpdatable(column)">
                            <div v-if="response.form_field_type[column] === 'check'">
                                <div class="form__group__checkbox">
                                    <input type="checkbox" :name="column" :id="column" class="form__checkbox" :checked="checkbox" v-model="editing.form[column]"/>
                                    <label :for="column" class="from__label__checkbox">{{ response.custom_columns[column] || column.toUpperCase() }}</label>
                                </div>
                            </div>
                            <div v-else-if="response.form_field_type[column] === 'date'">
                                <div class="form__wrap">
                                    <input v-model="editing.form[column]" class="form__item"  :type="response.form_field_type[column]" >
                                </div>

                                <span class="form__helper" v-if="editing.errors[column]">
                                    {{ editing.errors[column][0] }}
                                </span>

                            </div>
                            <div v-else class="from__group" :class="{'has__danger': editing.errors[column] }">
                                <div class="form__wrap">
                                    <input v-model="editing.form[column]" class="form__item"  :type="response.form_field_type[column]" >
                                </div>
                                <span class="form__helper" v-if="editing.errors[column]">
                                    {{ editing.errors[column][0] }}
                                </span>
                            </div>
                        </template>
                        <template v-else>
                            <template v-if="response.form_field_type[column] === 'date'">
                                {{ columnValue | toNow }}
                            </template>
                            <template v-else>
                                {{ columnValue }}
                            </template>
                        </template>
                    </td>
                    <td class="action__buttons">
                        <template v-if="editing.id !== records.id">
                            <a v-if="response.allow.quick_edit"  class="btn btn--sm btn--info-gradient" href="#" @click.prevent="edit(records)">Q</a>
                            <a v-if="response.allow.full_edit" :href="`/${area.slug}/${response.edit_path}/${records.key}/edit`" class="btn btn--sm btn--primary-gradient" ><i class="lunacon lunacon-expand"></i></a>
                            <a v-if="response.allow.deletion" class="btn btn--sm btn--danger-gradient"  href="#" @click.prevent="destroy(records.id)"><i class="lunacon lunacon-trash"></i></a>

                        </template>
                        <template v-if="editing.id === records.id">
                            <button type="submit" class="btn btn--xs btn--success-gradient" @click.prevent="update">Save<span v-if="processing"  class="mini-loader"></span></button>
                            <a class="btn btn--xs btn--warning-gradient" href="#" @click.prevent="editing.id = null">Cancel</a>
                        </template>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</template>

<script>

    import moment from 'moment/moment'
    import queryString from 'query-string'

    export default {
        name: "DataTable",
        props: ['endpoint', 'post_method', 'area'],
        data () {
            return {
                loaded: false,
                response: {
                    table: '',
                    displayable: [],
                    custom_columns: [],
                    records: [],
                    allow: {},
                    errors: [],
                    modal_text: '',
                    edit_path: '',
                    form_field_type: []
                },
                sort: {
                    key: 'id',
                    order: 'asc'
                },
                limit: "10",
                quickSearchQuery: '',
                editing: {
                    id: null,
                    slug: null,
                    form: {},
                    errors: []
                },
                creating: {
                    active: false,
                    form: {  },
                    errors: []
                },
                search: {
                    value: '',
                    operator: 'equels',
                    column: 'id'
                },
                selected: [],
                checked: [],
                checkbox: [],
                hide: [],
                processing: false
            }

        },
        computed: {
            filteredRecords() {
                let data = this.response.records.data

                data = data.filter((row) => {
                    return Object.keys(row).some((key)=> {
                        return String(row[key]).toLowerCase().indexOf(this.quickSearchQuery.toLowerCase()) > -1
                    })
                })

                if (this.sort.key) {
                    data = _.orderBy(data, (i) => {
                        let value = i[this.sort.key]
                        if (!isNaN(parseFloat(value))){
                            return parseFloat(value)
                        }
                        return String(i[this.sort.key]).toLowerCase()
                    }, this.sort.order)
                }
                return data
            },
            canSelectItems () {
                return this.filteredRecords.length <= 500
            }
        },
        filters: {
            toNow(date) {
                return moment(date).from();
            }
        },
        methods: {
            getRecords () {
                return axios.get(`${this.endpoint}?${this.getQueryParameters()}`).then((response) => {
                    this.response = response.data.data
                })
            },
            getQueryParameters () {
                return queryString.stringify({
                    limit: this.limit,
                    ...this.search
                })
            },
            sortBy (column) {
                this.sort.key = column
                this.sort.order = this.sort.order === 'asc' ? 'desc' : 'asc'
            },
            edit (records) {
                this.editing.errors = []
                this.editing.id = records.id
                this.editing.form = _.pick(records, this.response.updatable)
            },
            isUpdatable (column) {
                return this.response.updatable.includes(column)
            },
            update () {
                this.$Progress.start()
                const loader = this.$vToastify.loader("Please Wait...")
                this.processing = true
                axios.patch(`${this.endpoint}/${this.editing.id}`, this.editing.form).then(() => {
                    this.getRecords().then(() => {
                        this.editing.id = null
                        this.editing.form = {}
                    })
                    this.processing = false
                    this.$Progress.finish()
                    this.$vToastify.removeToast(loader)
                    this.$vToastify.success({
                        title: 'Success',
                        body: "Listing saved"
                    });

                }).catch((error) => {
                    this.processing = false
                    if (error.response.status === 422) {
                        this.editing.errors = error.response.data.errors
                    }
                    this.$Progress.fail()
                    this.$vToastify.removeToast(loader)
                    this.$vToastify.error({
                        title: "Error",
                        body: "Sorry something went wrong!"
                    });
                })
            },
            store () {
                this.$Progress.start()
                const loader = this.$vToastify.loader("Please Wait...")
                axios.post(`${this.endpoint}`, this.creating.form).then(() => {
                    this.getRecords().then(() => {
                        this.creating.active = false
                        this.creating.form = {}
                        this.creating.errors = []
                        this.$Progress.finish()
                        this.$vToastify.removeToast(loader)
                        this.$vToastify.success({
                            title: 'Success',
                            body: "Listing saved"
                        });
                    })
                }).catch((error) => {
                    if (error.response.status === 422) {
                        this.creating.errors = error.response.data.errors
                    }
                    this.$Progress.fail()
                    this.$vToastify.removeToast(loader)
                    this.$vToastify.error({
                        title: "Error",
                        body: "Sorry something went wrong!"
                    });
                })
            },
            destroy (record) {
                this.$vToastify.setSettings({position: "center-center", backdrop: "rgba(0, 0, 0, 0.5)"})
                this.$vToastify.prompt({
                    body: "Are you sure you want to delete this listing?",
                    answers: { Yes: true, No: false }
                }).then( (value) => {
                    if (value === false) {
                        return
                    }else {
                        this.$vToastify.setSettings({position: "bottom-right"})
                        this.$Progress.start()
                        const loader = this.$vToastify.loader("Please Wait...")
                        axios.delete(`${this.endpoint}/${record}`).then(() => {
                            this.selected = []
                            this.getRecords()
                        }).then( (response) => {
                            this.$Progress.finish()
                            this.$vToastify.removeToast(loader)
                            this.$vToastify.success({
                                title: 'Success',
                                body: "Listing saved"
                            });
                        }).catch((error) => {
                            this.$Progress.fail()
                            this.$vToastify.removeToast(loader)
                            this.$vToastify.error({
                                title: "Error",
                                body: "Sorry something went wrong!"
                            });
                        })
                    }

                } )

            },
            toggleSelectAll () {
                if (this.selected.length > 0) {
                    this.selected = []
                    return
                }
                this.selected = _.map(this.filteredRecords, 'id')
            }
        },
        created() {
            this.getRecords()
        }
    }
</script>


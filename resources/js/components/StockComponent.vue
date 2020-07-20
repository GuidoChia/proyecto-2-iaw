<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div v-if="stock!==null" class="col-sm">
                    <div class="card">
                        <div class="card-header">Stock</div>
                        <div class="card">
                            <b-table
                                id="stock-table"
                                :items="stock"
                                :fields="fields"
                                :per-page="perPage"
                                :current-page="currentPage"
                                :sortable=true
                                :sort-by.sync='sortBy'
                                :sort-desc.sync="sortDesc"
                                sort-icon-left
                                responsive
                            ></b-table>
                            <b-pagination
                                v-model="currentPage"
                                :total-rows="rows"
                                :per-page="perPage"
                                first-number
                                last-number
                                pills
                                align="center"
                                aria-controls="stock-table"
                            ></b-pagination>
                        </div>
                    </div>
                </div>
                <div v-if="stock!==null" class="col-sm">
                    <reactives-needed-component :stock="stock" :reactives="reactives"></reactives-needed-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios'
    import ReactivesNeededComponent from "./ReactivesNeededComponent";
    import './compiled-icons/icon';

    export default {
        data() {
            return {
                stock: [],
                reactives: [],
                perPage: 15,
                currentPage: 1,
                fields: [
                    {key: 'id', label: 'Stock Id', sortable: true},
                    {key: 'type', sortable: true},
                    {key: 'reactive_id', sortable: true},
                    {key: 'expiration', sortable: true},
                ],
                sortBy: "id",
                sortDesc: false,
                image_src: '/img/icon.png',
            }
        },
        components: {
            ReactivesNeededComponent
        },
        mounted() {

            Axios.get(
                'https://proyecto-2-iaw-guido.herokuapp.com/api/usage'
            ).then((response) => {
                this.stock = response.data.success
            });

            Axios.get(
                'https://proyecto-2-iaw-guido.herokuapp.com/api/reactives'
            ).then((response) => {
                this.reactives = response.data.success
            });

        },
        computed: {
            rows() {
                return this.stock.length
            }
        }
    }
</script>


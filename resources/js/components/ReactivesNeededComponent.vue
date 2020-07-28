<template>
    <div v-if="reactivesUsage" class="card">
        <div class="card-header">Most used reactives</div>
        <b-table
            id="most-used-table"
            :items="reactivesUsage"
            :fields="fields"
            :per-page="perPage"
            :current-page="currentPage"
            :sortable=true
            :sort-by.sync='sortBy'
            :sort-desc.sync="sortDesc"
            sort-icon-left
        ></b-table>
        <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            first-number
            last-number
            pills
            align="center"
            aria-controls="most-used-table"
        ></b-pagination>

    </div>
</template>

<script>
    export default {
        props: {
            stock: Array,
            reactives: Array
        },
        data() {
            return {
                perPage: 15,
                currentPage: 1,
                fields: [
                    {key: 'id', label:'Reactive Id',sortable: true},
                    {key: 'name', sortable: true},
                    {key: 'description', sortable: true},
                    {key: 'usedAmount', sortable: true},
                ],
                sortBy: "usedAmount",
                sortDesc: true,
            }
        },
        computed: {
            /* Devuelve un stock por cada reactivo que aparece  */
            uniqueReactivesStock: function () {
                let toRet = this.stock.filter((stock, index, self) =>
                    index === self.findIndex((t) => (
                        t.reactive_id === stock.reactive_id
                    ))
                )
                return toRet
            },
            usageArray: function () {
                let usageArray = new Array()
                /* Por cada reactivo que aparece en el stock, busco los stocks que se corresponden a este   */
                this.uniqueReactivesStock.forEach((uniqueStock) => {
                    usageArray.push(this.stock.filter((currentStock) => currentStock.reactive_id === uniqueStock.reactive_id))
                })

                /* Ordeno el arreglo de uso por su size de forma decreciente
                   (cantidad de veces que aparece el reactivo en stock) */
                usageArray.sort(function (a, b) {
                    return b.length - a.length;
                });
                return usageArray
            },
            reactivesUsage: function () {
                /* Retorno los reactivos junto con la cantidad de veces que aparecen en el stock    */
                return this.usageArray.map((currentArray) => {
                    let aux = this.reactives.find((reactive) => {
                        return reactive.id === currentArray[0].reactive_id
                    })
                    if (aux != undefined) {
                        aux.usedAmount = currentArray.length
                    }
                    return aux
                })
            },
            rows() {
                return this.reactivesUsage.length
            }
        }
    }
</script>

<script>
import { useForm } from '@inertiajs/vue3';
import ShoppingList from './components/ShoppingList.vue'
import ShoppingInfo from './components/ShoppingInfo.vue';
import ShoppingFilters from './components/ShoppingFilters.vue';

export default {
    components: {
        ShoppingList,
        ShoppingInfo,
        ShoppingFilters,
    },
    props: {
        userName: String,
        shoppings: Object,
    },
    data() {
        return {
            localShopping: this.shoppings,
            form: useForm({
                title: null,
            }),
        };
    },
    methods: {
        addShopping() {
            this.form.post('/shopping', {
                onSuccess: () => {
                    this.form.title = null;
                },
            });
        },
        filter(arg) {
            switch (arg) {
                case 'all':
                    this.localShopping = this.shoppings;
                    break;
                case 'purchased':
                    this.localShopping = this.shoppings.filter(item => item.complete);
                    break;
                case 'remaining':
                    this.localShopping = this.shoppings.filter(item => !item.complete);
                    break;
            }
        }
    },
    computed: {
        totalShoppings() {
            return this.shoppings.length;
        },
        totalShoppingsComplete() {
            return this.shoppings.filter((item) => item.complete === 1).length;
        },
        totalShoppingsUncomplete() {
            return this.totalShoppings - this.totalShoppingsComplete;
        },
    },
    watch: {
        shoppings(newShoppginsList) {
            this.localShopping = newShoppginsList;
        }
    }
};
</script>

<template>
    <div class="d-flex flex-column align-items-center" style="height: 100dvh">
        <div class="m-2">
            <h1>Lista de Compras</h1>
        </div>
        <ShoppingInfo :total-shoppings="totalShoppings" :total-shoppings-complete="totalShoppingsComplete"
            :total-shoppings-uncomplete="totalShoppingsUncomplete" />
        <div class="m-2">
            <div class="">
                <form class="d-flex gap-2" @submit.prevent="addShopping">
                    <input type="text" class="form-control" placeholder="Digite um item" required
                        v-model="form.title" />
                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </form>
            </div>
        </div>
        <ShoppingFilters @applyFilter="filter" />
        <ShoppingList :shoppings="localShopping" />
    </div>
</template>

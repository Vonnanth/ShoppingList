<script>
    export default {
        props: {
            totalShoppings: Number,
            totalShoppingsComplete: Number,
            totalShoppingsUncomplete: Number,
        }
    }
</script>

<template>
    <div class="row gap-4 w-100 justify-content-center">
            <div class="border-primary rounded-4 p-2 col-3 border border-3 text-center">
                <h5 class="text-nowrap">Total de Itens</h5>
                <span class="text-center">{{ totalShoppings }}</span>
            </div>
            <div class="border-warning rounded-4 p-2 col-3 border border-3 text-center">
                <h5 class="text-nowrap">Itens Comprados</h5>
                <span>{{ totalShoppingsComplete }}</span>
            </div>
            <div class="border-danger rounded-4 p-2 col-3 border border-3 text-center">
                <h5 class="text-nowrap">Itens Restantes</h5>
                <span>{{ totalShoppingsUncomplete }}</span>
            </div>
        </div>
</template>
<script>
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';

export default {
    name: 'ShoppingList',
    props: {
        shoppings: Object
    },
    methods: {
        completeShopping(id) {
            let shopping = this.shoppings.find((item) => item.id === id);

            if (shopping.complete === 0) {
                shopping.complete = 1;
            } else {
                shopping.complete = 0;
            }

            router.put('/shopping', {
                id,
                complete: shopping.complete,
            });
        },
        removeShopping(id) {
            router.delete('/shopping?id=' + id);
        },
        editShopping(id, title) {
            Swal.fire({
                theme: 'dark',
                icon: 'question',
                title: 'Edite o item',
                html: `
                        <input type="text" class="form-control" id="input-new-title" />
                    `,
                didOpen: () => {
                    const input = document.getElementById('input-new-title');
                    input.value = title;
                },
                showConfirmButton: true,
                showDenyButton: true,
                confirmButtonText: 'Salvar',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    const newTItle = document.getElementById('input-new-title').value;
                    router.patch(
                        '/shopping',
                        {
                            id,
                            title: newTItle,
                        },
                        {
                            onSuccess: () => {
                                Swal.fire({
                                    theme: 'dark',
                                    title: 'Sucesso!',
                                    text: 'Item editado!',
                                    icon: 'success'
                                });
                            },
                        },
                    );
                }
            });
        },
    }
}
</script>

<template>
    <div class="m-2">
        <div class="list-group">
            <label class="list-group-item bg-dark text-white" style="width: 300px !important" v-for="item in shoppings"
                :key="item.id">
                <input class="form-check-input me-1" type="checkbox" :checked="item.complete"
                    @change="completeShopping(item.id)" />
                <span :class="{ 'text-decoration-line-through': item.complete }">
                    {{ item.title }}
                </span>
                <button class="btn btn-sm float-end" @click="removeShopping(item.id)">
                    <i class="fa-solid fa-circle-minus small text-danger"></i>
                </button>
                <button class="btn btn-sm float-end" @click="editShopping(item.id, item.title)">
                    <i class="fa-solid fa-edit small text-warning"></i>
                </button>
            </label>
        </div>
    </div>
</template>
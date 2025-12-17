<script>
export default {
    name: 'ShoppingFilter',
    methods: {
        applyFilter(type) {
            switch (type) {
                case 'all':
                    this.$emit('applyFilter', 'all');
                    break;
                case 'purchased':
                    this.$emit('applyFilter', 'purchased');
                    break;
                case 'remaining':
                    this.$emit('applyFilter', 'remaining');
                    break;
            }
        }
    }
}
</script>

<template>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="input-filter-all" value="option1"
                @change="applyFilter('all')" checked>
            <label class="form-check-label" for="input-filter-all">Todos</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="input-filter-purchased"
                value="option2" @change="applyFilter('purchased')">
            <label class="form-check-label" for="input-filter-purchased">Comprados</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="input-filter-remaining"
                value="option3" @change="applyFilter('remaining')">
            <label class="form-check-label" for="input-filter-remaining">Restantes</label>
        </div>
    </div>
</template>
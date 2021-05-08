<template>
    <div>
        <table class="centered striped">
            <thead>
                <tr>
                    <th v-for="(column, i) in columnsDesc" :key="i">
                        {{column}}
                    </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="buttons.includes('add')">
                    <td :colspan="columnsData.length">
                    </td>
                    <td>
                        <Button color="green" @click="$emit('add')">
                            <i class="material-icons">add</i>
                        </Button>
                    </td>
                </tr>
                <tr v-for="(row, i) in data" :key="i">
                    <td v-for="(column, j) in columnsData" :key="j">
                        {{row[column]}}
                    </td>
                    <td>
                        <Button v-if="cbEdit(row)"
                                @click="$emit('edit', row)"
                                color="blue">
                            <i class="material-icons">edit</i>
                        </Button>
                        <Button v-if="cbDelete(row)"
                                @click="$emit('del', row)"
                                color="red">
                            <i class="material-icons">delete</i>
                        </Button>
                        <Button v-if="cbUndoDelete(row)"
                                @click="$emit('undel', row)"
                                color="blue">
                            <i class="material-icons">delete_sweep</i>
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Button from '@components/Button.vue'

export default {
    components: {
        Button
    },
    props: [
        'data', 'columnsData', 'columnsDesc', 'buttons', 'cbEdit', 'cbDelete', 'cbUndoDelete'
    ],
    data(){
        return {

        }
    }
}
</script>

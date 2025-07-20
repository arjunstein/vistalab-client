import { initFlowbite } from 'flowbite'
import './bootstrap'

document.addEventListener('livewire:navigated', () => {
    initFlowbite()
})

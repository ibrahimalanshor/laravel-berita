import './bootstrap';

const appOverlay = document.querySelector('#app-overlay')
const toggles = document.querySelectorAll('[data-toggle]')
const clickOutsideCloses = document.querySelectorAll('[data-click-outside-close]')

function closeEl(target) {
    appOverlay.classList.add('animate-fade-out')
    target.classList.add('animate-slide-out')

    setTimeout(() => {
        appOverlay.classList.add('hidden')
        target.classList.add('hidden')
        appOverlay.classList.remove('animate-fade-out')
        target.classList.remove('animate-slide-out')
    }, 1000);
}

toggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        const toggleType = toggle.dataset.toggle
        const target = document.querySelector(toggle.dataset.target)

        if (toggleType === 'drawer') {
            if (target.classList.contains('hidden')) {
                appOverlay.classList.remove('hidden')
                appOverlay.classList.add('animate-fade-in')

                target.classList.remove('hidden')
                target.classList.add('animate-slide-in')

                setTimeout(() => {
                    appOverlay.classList.remove('animate-fade-in')
                    target.classList.remove('animate-slide-in')
                }, 1000);
            } else {
                closeEl(target)
            }
        } else if (toggleType === 'grid') {
            target.classList.toggle('hidden')
            target.classList.toggle('grid')
        }
    })
})

clickOutsideCloses.forEach(el => {
    const type = el.dataset.clickOutsideClose
    
    if (type === 'drawer') {
        const ignore = document.querySelector(el.dataset.ignore)

        document.addEventListener('click', e => {
            if (!el.classList.contains('hidden') && !el.contains(e.target) && !ignore.contains(e.target)) {
                closeEl(el)
            }
        })
    }
})
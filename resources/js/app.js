import './bootstrap';

const appOverlay = document.querySelector('#app-overlay')
const toggles = document.querySelectorAll('[data-toggle]')
const clickOutsideCloses = document.querySelectorAll('[data-click-outside-close]')

function closeEl(target, type) {
    target.classList.add(type === 'drawer' ? 'animate-slide-out' : 'animate-fade-out')

    if (type === 'drawer') {
        appOverlay.classList.add('animate-fade-out')
    }

    setTimeout(() => {
        if (type === 'drawer') {
            appOverlay.classList.add('hidden')
            appOverlay.classList.remove('animate-fade-out')
        }

        target.classList.add('hidden')
        target.classList.remove(type === 'drawer' ? 'animate-slide-out' : 'animate-fade-out')
    }, type === 'drawer' ? 1000 : 500);
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
                target.dataset.closeType = 'drawer'

                setTimeout(() => {
                    appOverlay.classList.remove('animate-fade-in')
                    target.classList.remove('animate-slide-in')
                }, 1000);
            } else {
                closeEl(target, 'drawer')
            }
        } else if (toggleType === 'dropdown') {
            if (target.classList.contains('hidden')) {
                target.classList.remove('hidden')
                target.classList.add('animate-fade-in')
                target.dataset.closeType = 'dropdown'

                setTimeout(() => {
                    target.classList.remove('animate-fade-in')
                }, 500);
            } else {
                closeEl(target, 'dropdown')
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
        const ignores = Array.from(document.querySelectorAll(el.dataset.ignore))

        document.addEventListener('click', e => {
            if (!el.classList.contains('hidden') && !el.contains(e.target) && !ignores.some(ignore => ignore.contains(e.target))) {
                closeEl(el, el.dataset.closeType)
            }
        })
    }
})
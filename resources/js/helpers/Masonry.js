
export default class Masonry
{

    constructor(args) {
        this.args = args
        this.init()
    }

    init() {
        this.masonry()
    }

    default () {
        for (let a = arguments, i = 0; i < a.length; i++) {
            if (void 0 !== a[i]) return a[i]
        }
    }

    get option () {
        return {
            parent: this.default(this.args.parent, '.masonry'),
            child: this.default(this.args.child, '.masonry__child'),
        }
    }

    masonry() {
        let masonry = document.querySelectorAll(this.option.parent)

        if (masonry.length) {
            masonry.forEach( (element) => {
                let elHeight = parseInt(window.getComputedStyle(element).getPropertyValue('height'))
                console.log(elHeight)
            })
        }
    }



}

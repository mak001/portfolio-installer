<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %>$Content<% end_if %>
<% require themedCSS('dist/css/parts/elements/markdown.css') %>
<% require javascript('https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js') %>
<script>
    var decodeEntities = (function() {
        // this prevents any overhead from creating the object each time
        var element = document.createElement('div');

        function decodeHTMLEntities (str) {
            if(str && typeof str === 'string') {
            // strip script/html tags
            str = str.replace(/<script[^>]*>([\S\s]*?)<\\/script>/gmi, '');
            str = str.replace(/<\\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
            element.innerHTML = str;
            str = element.textContent;
            element.textContent = '';
            }

            return str;
        }

        return decodeHTMLEntities;
    })();

    // replace find:  ([a-zA-z]+):\s*'.*,\s*//\s*(.*)
    // relpace substitution: $1: 'var(--$2)',
    mermaid.mermaidAPI.initialize({
        theme: 'base',
        useMaxWidth: false,
        flowchartConfig: {
            useMaxWidth: false,
        },
        journey: {
            useMaxWidth: false,
        },
        themeVariables: {
            background: 'var(--surface2)',
            fontFamily: 'var(--font-sans)',
            fontSize: 'var(--font-size-2)',

            background: 'var(--surface2)',

            /* Main */
            primaryColor: 'var(--surface1)',
            secondaryColor: 'var(--surface3)',
            tertiaryColor: 'var(--surface4)',

            primaryBorderColor: 'var(--surface0)',
            secondaryBorderColor: 'var(--surface1)',
            tertiaryBorderColor: 'var(--surface3)',
            //noteBorderColor = this.noteBorderColor || mkBorder(this.noteBkgColor, this.darkMode);
            //noteBkgColor = this.noteBkgColor || '#fff5ad';
            noteTextColor: 'var(--text1)',

            primaryTextColor: 'var(--text1)',
            secondaryTextColor: 'var(--gray-9)',
            tertiaryTextColor: 'var(--gray-9)',
            lineColor: 'var(--brand)',
            textColor: 'var(--text1)',


            /* Flowchart variables */
            edgeLabelBackground: 'var(--surface3)',
            arrowheadColor: 'var(--brand)',

            /* Sequence Diagram variables */
            // actorLineColor = this.actorLineColor || 'grey';
            activationBorderColor: 'var(--surface4)',
            sequenceNumberColor: 'var(--brand-inverted)',


            /* Gantt chart variables */
            // this.altSectionBkgColor = this.altSectionBkgColor || 'white';
            // this.excludeBkgColor = this.excludeBkgColor || '#eeeeee';
            activeTaskBkgColor: 'var(--orange-4)',
            // this.gridColor = this.gridColor || 'lightgrey';
            // this.doneTaskBkgColor = this.doneTaskBkgColor || 'lightgrey';
            // this.doneTaskBorderColor = this.doneTaskBorderColor || 'grey';
            // this.critBorderColor = this.critBorderColor || '#ff8888';
            // this.critBkgColor = this.critBkgColor || 'red';
            // this.todayLineColor = this.todayLineColor || 'red';
            // this.taskTextClickableColor = this.taskTextClickableColor || '#003163';

            /* user-journey */
            fillType0: 'var(--gray-7)',
            fillType1: 'var(--orange-4)',
            fillType2: 'var(--blue-4)',
            fillType3: 'var(--orange-7)',
            fillType4: 'var(--gray-8)',
            fillType5: 'var(--blue-7)',
            fillType6: 'var(--orange-9)',
            fillType7: 'var(--blue-9)',
            actor0: 'var(--orange-6)',
            actor1: 'var(--red-6)',
            actor2: 'var(--pink-6)',
            actor3: 'var(--grape-6)',
            actor4: 'var(--violet-6)',
            actor5: 'var(--indigo-6)',

            /* pie */
            pie1: 'var(--orange-6)',
            pie2: 'var(--blue-6)',
            pie3: 'var(--red-6)',
            pie4: 'var(--indigo-6)',
            pie5: 'var(--lime-6)',
            pie6: 'var(--violet-6)',
            pie7: 'var(--green-6',
            pie8: 'var(--grape-6)',
            pie9: 'var(--teal-6)',
            pie10: 'var(--pink-6)',
            pie11: 'var(--cyan-6)',
            pie12: 'var(--red-6)',
            pieTitleTextSize: 'var(--font-size-4)',
            pieSectionTextSize: 'var(--font-size-3)',
            pieSectionTextColor: 'var(--gray-9)',
            pieLegendTextSize: 'var(--font-size-3)',
            pieStrokeColor: 'var(--gray-9)',
            pieStrokeWidth: '.15rem',
            pieOpacity: '1',

            /* requirement-diagram */
            relationLabelBackground: 'var(--surface3)',

            /* git  */
            branchLabelColor: 'var(--gray-9)',
            tagLabelBackground: 'var(--surface1)',
            tagLabelBorder: 'var(--gray-9)',
            commitLabelColor: 'var(--text1)',
            commitLabelBackground: 'var(--surface-1)',
            gitInv0: 'var(--cyan-6)',
            gitInv1: 'var(--blue-6)',
            gitInv2: 'var(--indigo-6)',
            gitInv3: 'var(--violet-6)',
            gitInv4: 'var(--grape-6)',
            gitInv5: 'var(--pink-6)',
            gitInv6: 'var(--red-6)',
            gitInv7: 'var(--orange-6)',
            // these are set later - the init forces calculations on these
            git0: '#fd7e14',
            git1: '#fab005',
            git2: '#82c91e',
            git3: '#40c057',
            git4: '#12b886',
            git5: '#15aabf',
            git6: '#228be6',
            git7: '#4c6ef5',
        },
    });

    // continuation of git - mermaid doesn't allow direct overrides without calculations
    mermaid.mermaidAPI.updateSiteConfig({
        themeVariables: {
            git0: 'var(--orange-6)',
            git1: 'var(--yellow-6)',
            git2: 'var(--lime-6)',
            git3: 'var(--green-6)',
            git4: 'var(--teal-6)',
            git5: 'var(--cyan-6)',
            git6: 'var(--blue-6)',
            git7: 'var(--inigo-6)',
        },
    });

    function initMermaid() {
        const mermaidElements = document.querySelectorAll('[lang=mermaid] code');
        let txt;

        for (let i = 0; i < mermaidElements.length; i++) {
            const element = mermaidElements[i];

            if (!element.getAttribute('data-processed')) {
                element.setAttribute('data-processed', true);
            } else {
                continue;
            }

            const id = `mermaid-${i}`;

            txt = element.innerHTML;
            txt = decodeEntities(txt).trim().replace(/<br\s*\\/?>/gi, '<br/>');

            let chartType = txt.split(/[\\r\\n]/)[0]
                .trim()
                .replace(/([A-Z])/, '-$1')
                .toLowerCase();
            let chartDirection;
            if (/\\s/.test(chartType)) {
                const chartData = chartType.split(/\\s/);
                chartType = chartData[0];
                chartDirection = chartData[1].replace(/^(-)/, '');
            }

            mermaid.mermaidAPI.render(id, txt, function(svgCode) {
                element.innerHTML = svgCode;
                const parent = element.parentElement;
                parent.setAttribute('data-chart-type', chartType);
                if (typeof chartDirection !== 'undefined') {
                    parent.setAttribute('data-chart-direction', chartDirection);
                }
            }, element);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initMermaid();
    });
</script>

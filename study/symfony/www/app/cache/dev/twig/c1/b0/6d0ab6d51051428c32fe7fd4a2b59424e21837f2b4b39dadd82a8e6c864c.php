<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_c1b06d0ab6d51051428c32fe7fd4a2b59424e21837f2b4b39dadd82a8e6c864c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className && el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                if (el.className) {
                    el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
                }
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) {
                    el.className += \" \" + klass;
                }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            },

            requestStack = [],

            renderAjaxRequests = function() {
                var requestCounter = document.querySelectorAll('.sf-toolbar-ajax-requests');
                if (!requestCounter.length) {
                    return;
                }

                var tbodies = document.querySelectorAll('.sf-toolbar-ajax-request-list');
                var state = 'ok';
                if (tbodies.length) {
                    var tbody = tbodies[0];

                    var rows = document.createDocumentFragment();

                    if (requestStack.length) {
                        for (var i = 0; i < requestStack.length; i++) {
                            var request = requestStack[i];

                            var row = document.createElement('tr');
                            rows.appendChild(row);

                            var methodCell = document.createElement('td');
                            methodCell.textContent = request.method;
                            row.appendChild(methodCell);

                            var pathCell = document.createElement('td');
                            pathCell.className = 'sf-ajax-request-url';
                            pathCell.textContent = request.url;
                            pathCell.setAttribute('title', request.url);
                            row.appendChild(pathCell);

                            var durationCell = document.createElement('td');
                            durationCell.className = 'sf-ajax-request-duration';

                            if (request.duration) {
                                durationCell.textContent = request.duration + \"ms\";
                            } else {
                                durationCell.textContent = '-';
                            }
                            row.appendChild(durationCell);

                            row.appendChild(document.createTextNode(' '));
                            var profilerCell = document.createElement('td');

                            if (request.profilerUrl) {
                                var profilerLink = document.createElement('a');
                                profilerLink.setAttribute('href', request.profilerUrl);
                                profilerLink.textContent = request.profile;
                                profilerCell.appendChild(profilerLink);
                            } else {
                                profilerCell.textContent = 'n/a';
                            }

                            row.appendChild(profilerCell);

                            var requestState = 'ok';
                            if (request.error) {
                                requestState = 'error';
                                if (state != \"loading\" && i > requestStack.length - 4) {
                                    state = 'error';
                                }
                            } else if (request.loading) {
                                requestState = 'loading';
                                state = 'loading'
                            }
                            row.className = 'sf-ajax-request sf-ajax-request-' + requestState;
                        }

                        var infoSpan = document.querySelectorAll(\".sf-toolbar-ajax-info\")[0];
                        var children = Array.prototype.slice.call(tbody.children);
                        for (var i = 0; i < children.length; i++) {
                            tbody.removeChild(children[i]);
                        }
                        tbody.appendChild(rows);

                        if (infoSpan) {
                            var text = requestStack.length + ' call' + (requestStack.length > 1 ? 's' : '');
                            infoSpan.textContent = text;
                        }
                    } else {
                        var cell = document.createElement('td');
                        cell.setAttribute('colspan', '4');
                        cell.textContent = \"No AJAX requests yet.\";
                        var row = document.createElement('tr');
                        row.appendChild(cell);
                        tbody.appendChild(row);
                    }
                }

                requestCounter[0].textContent = requestStack.length;

                var className = 'sf-toolbar-ajax-requests sf-toolbar-status';
                if (state == 'ok') {
                    className += ' sf-toolbar-status-green';
                } else if (state == 'error') {
                    className += ' sf-toolbar-status-red';
                } else {
                    className += ' sf-ajax-request-loading';
                }

                requestCounter[0].className = className;
            };

        var addEventListener;

        var el = document.createElement('div');
        if (!'addEventListener' in el) {
            addEventListener = function (element, eventName, callback) {
                element.attachEvent('on' + eventName, callback);
            };
        } else {
            addEventListener = function (element, eventName, callback) {
                element.addEventListener(eventName, callback, false);
            };
        }

        ";
        // line 187
        if (array_key_exists("excluded_ajax_paths", $context)) {
            // line 188
            echo "            if (window.XMLHttpRequest) {
                var proxied = XMLHttpRequest.prototype.open;

                XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
                    var self = this;

                    /* prevent logging AJAX calls to static and inline files, like templates */
                    if (url.substr(0, 1) === '/' && !url.match(new RegExp(\"";
            // line 195
            echo twig_escape_filter($this->env, (isset($context["excluded_ajax_paths"]) ? $context["excluded_ajax_paths"] : $this->getContext($context, "excluded_ajax_paths")), "html", null, true);
            echo "\"))) {
                        var stackElement = {
                            loading: true,
                            error: false,
                            url: url,
                            method: method,
                            start: new Date()
                        };

                        requestStack.push(stackElement);

                        this.addEventListener('readystatechange', function() {
                            if (self.readyState == 4) {
                                stackElement.duration = new Date() - stackElement.start;
                                stackElement.loading = false;
                                stackElement.error = self.status < 200 || self.status >= 400;
                                stackElement.profile = self.getResponseHeader(\"X-Debug-Token\");
                                stackElement.profilerUrl = self.getResponseHeader(\"X-Debug-Token-Link\");

                                Sfjs.renderAjaxRequests();
                            }
                        }, false);

                        Sfjs.renderAjaxRequests();
                    }

                    proxied.apply(this, Array.prototype.slice.call(arguments));
                };
            }
        ";
        }
        // line 225
        echo "
        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            addEventListener: addEventListener,

            request: request,

            renderAjaxRequests: renderAjaxRequests,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 225,  218 => 195,  209 => 188,  207 => 187,  19 => 1,);
    }
}

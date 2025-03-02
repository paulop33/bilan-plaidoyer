FROM gotenberg/gotenberg:8

USER root

COPY assets/styles/* /usr/local/share/fonts/

USER gotenberg

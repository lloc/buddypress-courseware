<div id="courseware-schedules-list">
    <?php if( !empty( $schedules ) ): ?>
    <div class="courseware-fullcalendar">
        <div id="loading" style="display:none">
            <?php BPSP_Static::get_image( 'loader.gif' ); ?>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th><?php _e( 'Description', 'bpsp' ); ?></th>
                <th><?php _e( 'Start date', 'bpsp' ); ?></th>
                <th><?php _e( 'End date', 'bpsp' ); ?></th>
                <th><?php _e( 'Location', 'bpsp' ); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ( $schedules as $schedule ):
        ?>
            <tr>
                <td class="description">
                    <a href="<?php echo $schedules_hanlder_uri . $schedule->post_name; ?>">
                        <?php echo $schedule->post_title; ?>
                    </a>
                    <div class="schedule-meta">
                        <?php
                            printf(
                                __( 'added on %1$s by %2$s.', 'bpsp' ),
                                mysql2date( get_option('date_format'), $schedule->post_date ),
                                bp_core_get_userlink( $schedule->post_author )
                            );
                        ?>
                    </div>
                </td>
                <td class="start-date">
                    <?php echo mysql2date( get_option('date_format') . ', ' . get_option('time_format'), $schedule->start_date ); ?>
                </td>
                <td class="end-date">
                    <?php echo mysql2date( get_option('date_format') . ', ' . get_option('time_format'), $schedule->end_date ); ?>
                </td>
                <td class="location">
                    <?php echo $schedule->location; ?>
                    <?php BPSP_Static::gmaps_link( $schedule->location ); ?>
                </td>
            </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>
    <?php
        endif;
    ?>
</div>
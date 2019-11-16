resource "aws_elb" "main" {
  name               = "elastic_lb"
  availability_zones = ["us-west-2b"]

  listener {
    instance_port     = 80
    instance_protocol = "http"
    lb_port           = 80
    lb_protocol       = "http"
  }
  
    listener {
    instance_port     = 443
    instance_protocol = "http"
    lb_port           = 443
    lb_protocol       = "http"
    acm_certificate_arn = "${aws_acm_certificate.default.0.arn}"
  }
  
    health_check {
    healthy_threshold   = 2
    unhealthy_threshold = 2
    timeout             = 3
    target              = "HTTP:80/"
    interval            = 30
  }
  
    instances                   = ["${aws_instance.project1-app.id}"]
    #instaces come from servers.tf where instances are first set up
    cross_zone_load_balancing   = true
    idle_timeout                = 400
    connection_draining         = true
    connection_draining_timeout = 400
}

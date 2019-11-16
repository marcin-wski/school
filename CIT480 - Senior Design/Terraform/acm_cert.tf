provider "aws" {
  alias = "acm"
  region = "us-west-2"
  version = "2.24"
}

resource "aws_acm_certificate" "default" {
  provider = "aws.acm"
  domain_name = "downtimerus.net"
  subject_alternative_names = "*.downtimerus.net"
  validation_method = "DNS"
  lifecycle {
    create_before_destroy = true
  }
}

resource "aws_route53_record" "validation" {
  zone_id = "${aws_route53_zone.public_zone.zone_id}"
  name = "${aws_acm_certificate.default.domain_validation_options.0.resource_record_name}"
  type = "${aws_acm_certificate.default.domain_validation_options.0.resource_record_type}"
  records = ["${aws_acm_certificate.default.domain_validation_options.0.resource_record_value}"]
  ttl = "300"
}

resource "aws_acm_certificate_validation" "default" {
  provider = "aws.acm"
  certificate_arn = "${aws_acm_certificate.default.arn}"
  validation_record_fqdns = [
    "${aws_route53_record.validation.fqdn}",
  ]
}
